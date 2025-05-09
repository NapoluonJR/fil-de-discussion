<x-mail::message>
# Nouveau message de contact

**De :** {{ $contactMessage->email }}  
**Objet :** {{ $contactMessage->subject }}

---

{{ $contactMessage->message }}

---

Merci,<br>
{{ config('app.name') }}
</x-mail::message>

