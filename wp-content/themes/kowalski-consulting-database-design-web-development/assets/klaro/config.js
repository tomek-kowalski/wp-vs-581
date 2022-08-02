var klaroConfig = {
    version: 1,
    elementID: 'klaro',
    noAutoLoad: false,
    htmlTexts: true,
    embedded: false,
    groupByPurpose: true,
    storageMethod: 'cookie',
    cookieName: 'klaro',
    cookieExpiresAfterDays: 365,
    default: false,
    mustConsent: false,
    acceptAll: true,
    hideDeclineAll: false,
    hideLearnMore: false,
    noticeAsModal: false,
    translations: {
        zz: {
            privacyPolicyUrl: window.location.href + 'polityka-prywatnosci/',
        },
        pl: {
            privacyPolicyUrl: window.location.href + 'polityka-prywatnosci/',   
            consentNotice: {
                description: 'Cześć! Czy moglibyśmy włączyć dodatkowe usługi optymalizacji wydajności strony oraz analityki marketingu? Zawsze możesz zmienić lub wycofać swoją zgodę później.',
            },
            consentModal: {
                description:
                    'Tutaj możesz zobaczyć i dostosować informacje, które zbieramy o Tobie.',
            },
            adsense: {
                description: 'Wyświetlanie reklam',
                title: 'Materiały reklamowe Google AdSense',
            },
            analytics: {
                description: 'Google Analytics',
                title: 'Google Analytics to usługa analityki internetowej oferowana przez Google, która śledzi i raportuje ruch w witrynie.',
            },
            cloudflare: {
                description: 'Ochrona przed atakami DDoS',
            },
            mouseflow: {
                description: 'Analiza użytkowników w czasie rzeczywistym',
            },
            googleFonts: {
                description: 'Czcionki internetowe hostowane przez Google',
            },
            purposes: {
                analytics: 'Statystyki odwiedzających',
                security: 'Bezpieczeństwo',
                livechat: 'Live Chat',
                advertising: 'Wyświetlanie reklam',
            },
        },
    },

    // This is a list of third-party services that Klaro will manage for you.
    services: [
        {
            name: 'Facebook',
            default: true,
            purposes: ['marketing'],
        },
        {
            name: 'Linkedin',
            default: true,
            purposes: ['marketing'],
        },
        {
            name: 'Instagram',
            default: true,
            purposes: ['marketing'],
        },
        {
            name: 'Twitter',
            default: true,
            purposes: ['marketing'],
        },
        {
            // Each service should have a unique (and short) name.
            name: 'Google Analytics',

            // If "default" is set to true, the service will be enabled by default
            // Overwrites global "default" setting.
            // We recommend leaving this to "false" for services that collect
            // personal information.
            default: true,

            // The title of your service as listed in the consent modal.
            title: 'Google Analytics',

            // The purpose(s) of this service. Will be listed on the consent notice.
            // Do not forget to add translations for all purposes you list here.
            purposes: ['analytics'],

            // A list of regex expressions or strings giving the names of
            // cookies set by this service. If the user withdraws consent for a
            // given service, Klaro will then automatically delete all matching
            // cookies.
            cookies: [
    //for the local version
                'piwik_ignore',
            ],

            // An optional callback function that will be called each time
            // the consent state for the service changes (true=consented). Passes
            // the `service` config as the second parameter as well.
            callback: function(consent, service) {
                // This is an example callback function.
                console.log(
                    'User consent for service ' + service.name + ': consent=' + consent
                );
                // To be used in conjunction with Matomo 'requireCookieConsent' Feature, Matomo 3.14.0 or newer
                // For further Information see https://matomo.org/faq/new-to-piwik/how-can-i-still-track-a-visitor-without-cookies-even-if-they-decline-the-cookie-consent/
                /*
                if(consent==true){
                    _paq.push(['rememberCookieConsentGiven']);
                } else {
                    _paq.push(['forgetCookieConsentGiven']);
                }
                */
            },

            // If "required" is set to true, Klaro will not allow this service to
            // be disabled by the user.
            required: false,

            // If "optOut" is set to true, Klaro will load this service even before
            // the user gave explicit consent.
            // We recommend always leaving this "false".
            optOut: false,

            // If "onlyOnce" is set to true, the service will only be executed
            // once regardless how often the user toggles it on and off.
            onlyOnce: true,
        },

        // The services will appear in the modal in the same order as defined here.



        {
            name: 'mouseflow',
            title: 'Mouseflow',
            purposes: ['analytics'],
        },
        {
            name: 'adsense',
            title: 'Google AdSense',
            purposes: ['advertising'],
        },
        {
            name: 'cloudflare',
            title: 'Cloudflare',
            purposes: ['security'],
            required: true,
        },
    ],
};