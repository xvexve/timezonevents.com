<?php









/**
 * Funcion que devuelve el idioma del navegador
 * 
 * @return string los dos digitos referentes al idioma (es, en, fr, ...)
 */
function getBrowseLanguage()
{
    $langsDefined=["es", "en", "fr", "it", "de", "pt"];
    $browseLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    return in_array($browseLang, $langsDefined) ? $browseLang : "en";
}

$textHeader=[
    "es"=>[
        "title"=>"Eventos de zona horaria",
        "description"=>"Muestre la fecha de su evento en la zona horaria del cliente",
        "keywords"=>"zona horaria, zonas horarias, evento, eventos, tiempo, hora"
    ],
    "en"=>[
        "title"=>"Time Zone Events",
        "description"=>"Show the date of your event in the client's time zone",
        "keywords"=>"time zone, time zones, event, events, time, hour"
    ],
    "fr"=>[
        "title"=>"Événements de fuseau horaire",
        "description"=>"Afficher la date de votre événement dans le fuseau horaire du client",
        "keywords"=>"fuseau horaire, fuseaux horaires, événement, événements, heure, heure"
    ],
    "it"=>[
        "title"=>"Eventi di fuso orario",
        "description"=>"Mostra la data del tuo evento nel fuso orario del cliente",
        "keywords"=>"fuso orario, fusi orari, evento, eventi, ora, ora"
    ],
    "de"=>[
        "title"=>"Zeitzonenereignisse",
        "description"=>"Zeigen Sie das Datum Ihrer Veranstaltung in der Zeitzone des Kunden an",
        "keywords"=>"Zeitzone, Zeitzonen, Ereignis, Ereignisse, Zeit, Stunde"
    ],
    "pt"=>[
        "title"=>"Eventos de fuso horário",
        "description"=>"Mostre a data do seu evento no fuso horário do cliente",
        "keywords"=>"fuso horário, fusos horários, evento, eventos, hora, hora"
    ],
];

/**
 * Function that return the key from $textHeader language
 * 
 * @param string $key
 * 
 * @return string
 */
function showHeader($key)
{
    global $textHeader;
    return $textHeader[getBrowseLanguage()][$key];
}

$lang=[
    "es"=>[
        "h1"=>"Zona horaria para eventos ",
        "select[name=tz] option"=>"Selecciona una zona horaria a mostrar",
        "#createEvent"=>"Crear un nuevo evento",
        "#editEvent"=>"Editar evento",
        "#remaining>span:first-child"=>"Tiempo restante: ",
        "#addTz"=>"Añadir ZO",
        "#url button"=>"Copiar Url",
        "main>div:last-child"=>"Copia esta url en tu página web",

        "#new h2"=>"Crear un nuevo evento",
        "#new .txt"=>"Texto descriptivo del evento",
        "#new .newAddDttz"=>"Zona horaria del evento (solo si hay un evento)",
        "#new .date"=>"Fecha y hora del evento",
        "#new .newPeriodicity"=>"Periodicidad",
        "#new [name=newPeriodicity] option"=>"Sin periodicidad",
        "#new [name=newPeriodicity] option[value=d]"=>"Diario",
        "#new [name=newPeriodicity] option[value=w]"=>"Semanal",
        "#new [name=newPeriodicity] option[value=m]"=>"Mensual",
        "#new [name=newPeriodicity] option[value=y]"=>"Anual",
        "#new .newAddTz"=>"Zonas horarias a mostrar (siempre se muestra la zona horaria del usuario que se conecte)",
        "select[name=newAddTz] option"=>"Selecciona una zona horaria a mostrar",
        "#newAddTz"=>"Añadir ZO",
        "#newCreate"=>"Crear",
        "#newClose"=>"Cancelar",
    ],
    "en"=>[
        "h1"=>"Time zone for events",
        "select[name=tz] option"=>"Select a timezone to show",
        "#createEvent"=>"Create a new event",
        "#editEvent"=>"Edit event",
        "#remaining>span:first-child"=>"Time left: ",
        "#addTz"=>"Add TZ",
        "#url button"=>"Copy Url",
        "main>div:last-child"=>"Copy this url on your web page",

        "#new h2"=>"Create a new event",
        "#new .txt"=>"Descriptive text of the event",
        "#new .newAddDttz"=>"Event time zone (only if there is an event)",
        "#new .date"=>"Date and time of the event",
        "#new .newPeriodicity"=>"Periodicity",
        "#new [name=newPeriodicity] option"=>"Without periodicity",
        "#new [name=newPeriodicity] option[value=d]"=>"Daily",
        "#new [name=newPeriodicity] option[value=w]"=>"Weekly",
        "#new [name=newPeriodicity] option[value=m]"=>"Monthly",
        "#new [name=newPeriodicity] option[value=y]"=>"Annual",
        "#new .newAddTz"=>"Time zones to display (the time zone of the user who connects is always displayed)",
        "select[name=newAddTz] option"=>"Select a timezone to show",
        "#newAddTz"=>"Add TZ",
        "#newCreate"=>"Create",
        "#newClose"=>"Cancel",
    ],
    "fr"=>[
        "h1"=>"Fuseau horaire des événements ",
        "select[name=tz] option"=>"Sélectionnez un fuseau horaire à afficher",
        "#createEvent"=>"Créer un nouvel événement",
        "#editEvent"=>"Modifier l'événement",
        "#remaining>span:first-child"=>"Temps restant: ",
        "#addTz"=>"Ajouter FH",
        "#url button"=>"Copier le lien",
        "main>div:last-child"=>"Copiez cette URL sur votre page Web",

        "#new h2"=>"Créer un nouvel événement",
        "#new .txt"=>"Texte descriptif de l'événement",
        "#new .newAddDttz"=>"Fuseau horaire de l'événement (uniquement s'il y a un événement)",
        "#new .date"=>"Date et heure de l'événement",
        "#new .newPeriodicity"=>"Périodicité",
        "#new [name=newPeriodicity] option"=>"Sans périodicité",
        "#new [name=newPeriodicity] option[value=d]"=>"du quotidien",
        "#new [name=newPeriodicity] option[value=w]"=>"Hebdomadaire",
        "#new [name=newPeriodicity] option[value=m]"=>"Mensuel",
        "#new [name=newPeriodicity] option[value=y]"=>"Annuel",
        "#new .newAddTz"=>"Fuseaux horaires à afficher (le fuseau horaire de l'utilisateur qui se connecte est toujours affiché)",
        "select[name=newAddTz] option"=>"Sélectionnez un fuseau horaire à afficher",
        "#newAddTz"=>"Ajouter FH",
        "#newCreate"=>"Créer",
        "#newClose"=>"Annuler",
    ],
    "it"=>[
        "h1"=>"Fuso orario per eventi",
        "select[name=tz] option"=>"Seleziona un fuso orario da mostrare",
        "#createEvent"=>"Crea un nuovo evento",
        "#editEvent"=>"Modifica evento",
        "#remaining>span:first-child"=>"Tempo rimasto: ",
        "#addTz"=>"Aggiungi FO",
        "#url button"=>"Copia URL",
        "main>div:last-child"=>"Copia questo URL sulla tua pagina web",

        "#new h2"=>"Crea un nuovo evento",
        "#new .txt"=>"Testo descrittivo dell'evento",
        "#new .newAddDttz"=>"Fuso orario dell'evento (solo se c'è un evento)",
        "#new .date"=>"Data e ora dell'evento",
        "#new .newPeriodicity"=>"Periodicità",
        "#new [name=newPeriodicity] option"=>"Senza periodicità",
        "#new [name=newPeriodicity] option[value=d]"=>"Quotidiano",
        "#new [name=newPeriodicity] option[value=w]"=>"settimanalmente",
        "#new [name=newPeriodicity] option[value=m]"=>"Mensile",
        "#new [name=newPeriodicity] option[value=y]"=>"Annuale",
        "#new .newAddTz"=>"Fusi orari da visualizzare (viene sempre visualizzato il fuso orario dell'utente che si connette)",
        "select[name=newAddTz] option"=>"Seleziona un fuso orario da mostrare",
        "#newAddTz"=>"Aggiungi FO",
        "#newCreate"=>"Creare",
        "#newClose"=>"Annulla",
    ],
    "de"=>[
        "h1"=>"Zeitzone für Ereignisse",
        "select[name=tz] option"=>"Wählen Sie eine Zeitzone aus, die angezeigt werden soll",
        "#createEvent"=>"Erstellen Sie ein neues Ereignis",
        "#editEvent"=>"Ereignis bearbeiten",
        "#remaining>span:first-child"=>"Übrige Zeit: ",
        "#addTz"=>"TZ hinzufügen",
        "#url button"=>"URL kopieren",
        "main>div:last-child"=>"Kopieren Sie diese URL auf Ihre Webseite",

        "#new h2"=>"Erstellen Sie ein neues Ereignis",
        "#new .txt"=>"Beschreibender Text der Veranstaltung",
        "#new .newAddDttz"=>"Ereigniszeitzone (nur wenn ein Ereignis vorliegt)",
        "#new .date"=>"Datum und Uhrzeit der Veranstaltung",
        "#new .newPeriodicity"=>"Periodizität",
        "#new [name=newPeriodicity] option"=>"Ohne Periodizität",
        "#new [name=newPeriodicity] option[value=d]"=>"Täglich",
        "#new [name=newPeriodicity] option[value=w]"=>"Wöchentlich",
        "#new [name=newPeriodicity] option[value=m]"=>"Monatlich",
        "#new [name=newPeriodicity] option[value=y]"=>"Jährlich",
        "#new .newAddTz"=>"Zu zeigende Zeitzonen (die Zeitzone des Benutzers, der eine Verbindung herstellt, wird immer angezeigt)",
        "select[name=newAddTz] option"=>"Wählen Sie eine Zeitzone aus, die angezeigt werden soll",
        "#newAddTz"=>"TZ hinzufügen",
        "#newCreate"=>"Erstellen",
        "#newClose"=>"Stornieren",
    ],
    "pt"=>[
        "h1"=>"Fuso horário para eventos",
        "select[name=tz] option"=>"Selecione um fuso horário para mostrar",
        "#createEvent"=>"Crie um novo evento",
        "#editEvent"=>"Editar evento",
        "#remaining>span:first-child"=>"Tempo restante: ",
        "#addTz"=>"Adicionar FO",
        "#url button"=>"Copiar URL",
        "main>div:last-child"=>"Copie este url em sua página da web",

        "#new h2"=>"Crie um novo evento",
        "#new .txt"=>"Texto descritivo do evento",
        "#new .newAddDttz"=>"Fuso horário do evento (apenas se houver um evento)",
        "#new .date"=>"Data e hora do evento",
        "#new .newPeriodicity"=>"Periodicidade",
        "#new [name=newPeriodicity] option"=>"Sem periodicidade",
        "#new [name=newPeriodicity] option[value=d]"=>"Diariamente",
        "#new [name=newPeriodicity] option[value=w]"=>"Semanalmente",
        "#new [name=newPeriodicity] option[value=m]"=>"Por mês",
        "#new [name=newPeriodicity] option[value=y]"=>"Anual",
        "#new .newAddTz"=>"Fusos horários a serem exibidos (o fuso horário do usuário que se conecta é sempre exibido)",
        "select[name=newAddTz] option"=>"Selecione um fuso horário para mostrar",
        "#newAddTz"=>"Adicionar FO",
        "#newCreate"=>"Crio",
        "#newClose"=>"Cancelar",
    ]
];

$sampleLang=[
    "es"=>"Este es un evento de ejemplo para ver el funcionamiento del sistema.\\n\\nEl evento de ejemplo es para el proximo dia XXX a las 10:00 en la Zona Horaria: YYY",
    "en"=>"This is a sample event to see how the system works.\\n\\nThe example event is for the next day XXX at 10:00 in Time Zone: YYY",
    "fr"=>"Ceci est un exemple d'événement pour voir comment le système fonctionne.\\n\\nL'événement d'exemple est pour le jour suivant XXX à 10h00 dans le fuseau horaire: YYY",
    "it"=>"Questo è un evento di esempio per vedere come funziona il sistema.\\n\\nL'evento di esempio è per il giorno successivo XXX alle 10:00 nel fuso orario: YYY",
    "de"=>"Dies ist ein Beispielereignis, um zu sehen, wie das System funktioniert.\\n\\nDas Beispielereignis ist für den nächsten Tag XXX um 10:00 Uhr in der Zeitzone: YYY",
    "pt"=>"Este é um exemplo de evento para ver como o sistema funciona.\\n\\nO exemplo de evento é para o próximo dia XXX às 10:00 no fuso horário: YYY",
];

/**
 * Funcion que devuelve en formato JavaScript los textos de ejemplo.
 * 
 * @return string
 */
function returnText()
{
    global $lang, $sampleLang;
    $result="<script>";
    $result.="const lang={";
    foreach ($lang[getBrowseLanguage()] as $key=>$value) {
        $result.="'$key':'$value',";
    }
    $result.="};";
    $result.="const sampleLang=\"".$sampleLang[getBrowseLanguage()]."\";</script>";
    return $result;
}
?>
