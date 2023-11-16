<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        VerifyEmail::$toMailCallback = function($notifiable, $verificationUrl) {
            return (new MailMessage)
            ->subject(Lang::get('DevJobs'))
            ->greeting(Lang::get("Hola ") . $notifiable->name)
            ->line(Lang::get('Porfavor da click en el boton para verificar tu correo electronico.'))
            ->action(Lang::get('Verificar Ahora'), $verificationUrl)
            ->line(Lang::get('Si tu no creaste esta cuenta ignora este correo.'))
            ->salutation(new HtmlString(
            Lang::get("Un saludo.").'<br>' .'<strong>'. Lang::get("DevJobs") . '</strong>'
            ));
            };
    }
}
