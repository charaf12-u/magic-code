<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Show the contact page.
     */
    public function index(): View
    {
        return view('pages.contact', [
            'title' => __('site.nav_contact') . ' — Magic Code',
            'metaDescription' => __('site.contact_lead'),
            'contactEmail' => config('contact.email'),
            'contactPhone' => config('contact.phone'),
            'contactWhatsapp' => config('contact.whatsapp'),
            'contactLocation' => config('contact.location'),
        ]);
    }

    /**
     * Store a newly created contact message and redirect to WhatsApp.
     */
    public function store(ContactRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        try {
            // 1. Sauvegarde en base de données pour archivage et suivi
            $contactMessage = ContactMessage::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'service' => $validated['service'] ?? null,
                'message' => $validated['message'],
                'ip_address' => $request->ip(),
            ]);

            Log::info('Magic Code: nouveau message reçu via le site (redirection WhatsApp)', [
                'id' => $contactMessage->id,
                'email' => $contactMessage->email,
                'service' => $contactMessage->service,
            ]);

            // 2. Préparation du message structuré pour WhatsApp
            $serviceLabel = !empty($validated['service']) ? $validated['service'] : 'Non spécifié';

            $whatsappBody = "🚀 *Nouvelle demande de projet — Magic Code*\n\n"
                . "👤 *Nom :* " . $validated['name'] . "\n"
                . "📧 *Email :* " . $validated['email'] . "\n"
                . "💼 *Service :* " . $serviceLabel . "\n\n"
                . "💬 *Message :*\n" . $validated['message'];

            $rawWhatsapp = (string) config('contact.whatsapp', '212600000000');
            $cleanWhatsapp = preg_replace('/[^0-9]/', '', $rawWhatsapp);

            $whatsappUrl = 'https://wa.me/' . $cleanWhatsapp . '?text=' . rawurlencode($whatsappBody);

            // 3. Redirection directe vers WhatsApp
            return redirect()->away($whatsappUrl);
        } catch (\Throwable $e) {
            Log::error('Magic Code: erreur lors de l\'enregistrement du contact', [
                'error' => $e->getMessage(),
            ]);

            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de l\'envoi. Veuillez réessayer ou nous écrire directement à ' . config('contact.email') . '.');
        }
    }
}
