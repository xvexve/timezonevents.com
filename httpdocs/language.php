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
$langBrowser=getBrowseLanguage();

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
    global $textHeader, $langBrowser;
    return $textHeader[$langBrowser][$key];
}





$lang=[
    "es"=>[
        "phpH1"=>"Zona horaria para eventos ",
        "phpTzOption"=>"Selecciona una zona horaria a mostrar",
        "phpCreateEvent"=>"Crear un nuevo evento",
        "phpEditEvent"=>"Editar evento",
        "phpRemainig"=>"Tiempo restante: ",
        "phpAddTz"=>"Añadir ZO",
        "phpCopyUrl"=>"Copiar Url",
        "phpInfoCopyUrl"=>"Copia esta url en tu página web",

        "phpH2"=>"Crear un nuevo evento",
        "phpNewText"=>"Texto descriptivo del evento",
        "phpNewDttz"=>"Zona horaria del evento (solo si hay un evento)",
        "phpNewDate"=>"Fecha y hora del evento",
        "phpNewPeridicity"=>"Periodicidad",
        "phpNewPeridicityEmpty"=>"Sin periodicidad",
        "phpNewPeridicityD"=>"Diario",
        "phpNewPeridicityW"=>"Semanal",
        "phpNewPeridicityM"=>"Mensual",
        "phpNewPeridicityY"=>"Anual",
        "phpNewTz"=>"Zonas horarias a mostrar (siempre se muestra la zona horaria del usuario que se conecte)",
        "phpNewTz"=>"Añadir ZO",
        "phpNewCreate"=>"Crear",
        "phpNewClose"=>"Cancelar",
    ],
    "en"=>[
        "phpH1"=>"Time zone for events",
        "phpTzOption"=>"Select a timezone to show",
        "phpCreateEvent"=>"Create a new event",
        "phpEditEvent"=>"Edit event",
        "phpRemainig"=>"Time left: ",
        "phpAddTz"=>"Add TZ",
        "phpCopyUrl"=>"Copy Url",
        "phpInfoCopyUrl"=>"Copy this url on your web page",

        "phpH2"=>"Create a new event",
        "phpNewText"=>"Descriptive text of the event",
        "phpNewDttz"=>"Event time zone (only if there is an event)",
        "phpNewDate"=>"Date and time of the event",
        "phpNewPeridicity"=>"Periodicity",
        "phpNewPeridicityEmpty"=>"Without periodicity",
        "phpNewPeridicityD"=>"Daily",
        "phpNewPeridicityW"=>"Weekly",
        "phpNewPeridicityM"=>"Monthly",
        "phpNewPeridicityY"=>"Annual",
        "phpNewTz"=>"Time zones to display (the time zone of the user who connects is always displayed)",
        "phpNewTz"=>"Add TZ",
        "phpNewCreate"=>"Create",
        "phpNewClose"=>"Cancel",
    ],
    "fr"=>[
        "phpH1"=>"Fuseau horaire des événements ",
        "phpTzOption"=>"Sélectionnez un fuseau horaire à afficher",
        "phpCreateEvent"=>"Créer un nouvel événement",
        "phpEditEvent"=>"Modifier l'événement",
        "phpRemainig"=>"Temps restant: ",
        "phpAddTz"=>"Ajouter FH",
        "phpCopyUrl"=>"Copier le lien",
        "phpInfoCopyUrl"=>"Copiez cette URL sur votre page Web",

        "phpH2"=>"Créer un nouvel événement",
        "phpNewText"=>"Texte descriptif de l'événement",
        "phpNewDttz"=>"Fuseau horaire de l'événement (uniquement s'il y a un événement)",
        "phpNewDate"=>"Date et heure de l'événement",
        "phpNewPeridicity"=>"Périodicité",
        "phpNewPeridicityEmpty"=>"Sans périodicité",
        "phpNewPeridicityD"=>"du quotidien",
        "phpNewPeridicityW"=>"Hebdomadaire",
        "phpNewPeridicityM"=>"Mensuel",
        "phpNewPeridicityY"=>"Annuel",
        "phpNewTz"=>"Fuseaux horaires à afficher (le fuseau horaire de l'utilisateur qui se connecte est toujours affiché)",
        "phpNewTz"=>"Ajouter FH",
        "phpNewCreate"=>"Créer",
        "phpNewClose"=>"Annuler",
    ],
    "it"=>[
        "phpH1"=>"Fuso orario per eventi",
        "phpTzOption"=>"Seleziona un fuso orario da mostrare",
        "phpCreateEvent"=>"Crea un nuovo evento",
        "phpEditEvent"=>"Modifica evento",
        "phpRemainig"=>"Tempo rimasto: ",
        "phpAddTz"=>"Aggiungi FO",
        "phpCopyUrl"=>"Copia URL",
        "phpInfoCopyUrl"=>"Copia questo URL sulla tua pagina web",

        "phpH2"=>"Crea un nuovo evento",
        "phpNewText"=>"Testo descrittivo dell'evento",
        "phpNewDttz"=>"Fuso orario dell'evento (solo se c'è un evento)",
        "phpNewDate"=>"Data e ora dell'evento",
        "phpNewPeridicity"=>"Periodicità",
        "phpNewPeridicityEmpty"=>"Senza periodicità",
        "phpNewPeridicityD"=>"Quotidiano",
        "phpNewPeridicityW"=>"settimanalmente",
        "phpNewPeridicityM"=>"Mensile",
        "phpNewPeridicityY"=>"Annuale",
        "phpNewTz"=>"Fusi orari da visualizzare (viene sempre visualizzato il fuso orario dell'utente che si connette)",
        "phpNewTz"=>"Aggiungi FO",
        "phpNewCreate"=>"Creare",
        "phpNewClose"=>"Annulla",
    ],
    "de"=>[
        "phpH1"=>"Zeitzone für Ereignisse",
        "phpTzOption"=>"Wählen Sie eine Zeitzone aus, die angezeigt werden soll",
        "phpCreateEvent"=>"Erstellen Sie ein neues Ereignis",
        "phpEditEvent"=>"Ereignis bearbeiten",
        "phpRemainig"=>"Übrige Zeit: ",
        "phpAddTz"=>"TZ hinzufügen",
        "phpCopyUrl"=>"URL kopieren",
        "phpInfoCopyUrl"=>"Kopieren Sie diese URL auf Ihre Webseite",

        "phpH2"=>"Erstellen Sie ein neues Ereignis",
        "phpNewText"=>"Beschreibender Text der Veranstaltung",
        "phpNewDttz"=>"Ereigniszeitzone (nur wenn ein Ereignis vorliegt)",
        "phpNewDate"=>"Datum und Uhrzeit der Veranstaltung",
        "phpNewPeridicity"=>"Periodizität",
        "phpNewPeridicityEmpty"=>"Ohne Periodizität",
        "phpNewPeridicityD"=>"Täglich",
        "phpNewPeridicityW"=>"Wöchentlich",
        "phpNewPeridicityM"=>"Monatlich",
        "phpNewPeridicityY"=>"Jährlich",
        "phpNewTz"=>"Zu zeigende Zeitzonen (die Zeitzone des Benutzers, der eine Verbindung herstellt, wird immer angezeigt)",
        "phpNewTz"=>"TZ hinzufügen",
        "phpNewCreate"=>"Erstellen",
        "phpNewClose"=>"Stornieren",
    ],
    "pt"=>[
        "phpH1"=>"Fuso horário para eventos",
        "phpTzOption"=>"Selecione um fuso horário para mostrar",
        "phpCreateEvent"=>"Crie um novo evento",
        "phpEditEvent"=>"Editar evento",
        "phpRemainig"=>"Tempo restante: ",
        "phpAddTz"=>"Adicionar FO",
        "phpCopyUrl"=>"Copiar URL",
        "phpInfoCopyUrl"=>"Copie este url em sua página da web",

        "phpH2"=>"Crie um novo evento",
        "phpNewText"=>"Texto descritivo do evento",
        "phpNewDttz"=>"Fuso horário do evento (apenas se houver um evento)",
        "phpNewDate"=>"Data e hora do evento",
        "phpNewPeridicity"=>"Periodicidade",
        "phpNewPeridicityEmpty"=>"Sem periodicidade",
        "phpNewPeridicityD"=>"Diariamente",
        "phpNewPeridicityW"=>"Semanalmente",
        "phpNewPeridicityM"=>"Por mês",
        "phpNewPeridicityY"=>"Anual",
        "phpNewTz"=>"Fusos horários a serem exibidos (o fuso horário do usuário que se conecta é sempre exibido)",
        "phpNewTz"=>"Adicionar FO",
        "phpNewCreate"=>"Crio",
        "phpNewClose"=>"Cancelar",
    ]
];

function gText($key)
{
    global $lang, $langBrowser;
    return $lang[$langBrowser][$key];
}


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
    global $lang, $langBrowser, $sampleLang;
    $result="<script>";
    $result.="const sampleLang=\"".$sampleLang[$langBrowser]."\";";
    $result.="</script>";
    return $result;
}

?>
