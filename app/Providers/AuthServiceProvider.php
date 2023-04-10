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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        VerifyEmail::$toMailCallback = function($notifiable, $verificationUrl) {
            return (new MailMessage)
                ->subject(Lang::get('Verifica tu Correo Electronico'))
                ->greeting(Lang::get("Hola ") . $notifiable->name)
                ->line(Lang::get('Tu cuenta esta casi lista solo debes presionar el boton "Verificar"'))
                ->action(Lang::get('Vereficar Ahora'), $verificationUrl)
                ->line(Lang::get('SI tu no creaste esta cuenta puedes ignorar este mensaje'))
                ->salutation(new HtmlString(
                Lang::get("Equipo").'<br>' .'<strong>'. Lang::get("DevJobs") . '</strong>'
            ));
        };
    }
}
