<style>
    fieldset {
        border: 1px solid lightgrey;
        padding-right: 10px;
        padding-left: 10px;
        margin-bottom: 10px;
    }

    legend {
        width: auto; /* Or auto */
        padding: 10px; /* To give a bit of padding on the left and right */
        border-bottom: none;
        font-weight: bold;
    }
</style>

<?php
// CRM server conection data
define('CRM_HOST', 'sfkvs.bitrix24.de'); // your CRM domain name
define('CRM_PORT', '443'); // CRM server port
define('CRM_PATH', 'https://sfkvs.bitrix24.de/crm/configs/import/lead.php'); // CRM server REST service path

// CRM server authorization data
define('CRM_LOGIN', 'kamephis@gmail.com'); // login of a CRM user able to manage leads
define('CRM_PASSWORD', 'hallo2202'); // password of a CRM user
// OR you can send special authorization hash which is sent by server after first successful connection with login and password
//define('CRM_AUTH', 'e54ec19f0c5f092ea11145b80f465e1a'); // authorization hash

/********************************************************************************************/

// POST processing
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $leadData = $_POST['DATA'];

    // get lead data from the form
    $postData = array(
        'TITLE' => $leadData['TITLE'],
        'COMPANY_TITLE' => $leadData['COMPANY_TITLE'],
        'NAME' => $leadData['NAME'],
        'LAST_NAME' => $leadData['LAST_NAME'],

        'COMMENTS' => $leadData['COMMENTS'],
        'PHONE_WORK' => $leadData['PHONE_WORK'],
        'EMAIL_WORK' => $leadData['EMAIL_WORK'],
        'UF_CRM_1476015675' => $leadData['Hochschule'],
        'UF_CRM_1476036880' => implode(',', $leadData['wunschfaecher']),
        'UF_CRM_1476015652' => implode(',', $leadData['Einsatzort']),
        'UF_CRM_1476015706' => $leadData['Zeiten'],

        'UF_CRM_1475962980' => $leadData['Studiengang'],
        'UF_CRM_1475967984' => $leadData['Strasse'],
        'UF_CRM_1475968004' => $leadData['PLZ'],
        'UF_CRM_1475968018' => $leadData['Ort'],
        'UF_CRM_1475969432' => $leadData['Anrede'],
        'POST' => $leadData['POST']
    );

    // append authorization data
    if (defined('CRM_AUTH')) {
        $postData['AUTH'] = CRM_AUTH;
    } else {
        $postData['LOGIN'] = CRM_LOGIN;
        $postData['PASSWORD'] = CRM_PASSWORD;
    }

    // open socket to CRM
    $fp = fsockopen("ssl://" . CRM_HOST, CRM_PORT, $errno, $errstr, 30);
    if ($fp) {
        // prepare POST data
        $strPostData = '';
        foreach ($postData as $key => $value)
            $strPostData .= ($strPostData == '' ? '' : '&') . $key . '=' . urlencode($value);

        // prepare POST headers
        $str = "POST " . CRM_PATH . " HTTP/1.0\r\n";
        $str .= "Host: " . CRM_HOST . "\r\n";
        $str .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $str .= "Content-Length: " . strlen($strPostData) . "\r\n";
        $str .= "Connection: close\r\n\r\n";

        $str .= $strPostData;

        // send POST to CRM
        fwrite($fp, $str);

        // get CRM headers
        $result = '';
        while (!feof($fp)) {
            $result .= fgets($fp, 128);
        }
        fclose($fp);

        // cut response headers
        $response = explode("\r\n\r\n", $result);
        $output = '<pre>' . print_r($response[1], 1) . '</pre>';
    } else {
        echo 'Connection Failed! ' . $errstr . ' (' . $errno . ')';
    }
} else {
    $output = '';
}

// HTML form
?>
<? //=$output;?>
<?php
$response = null;
if (strlen($response[1]) > 0) {
    echo '<h1>Vielen Dank für Ihre Nachricht</h1>';
    echo '<div class="alert alert-success">';
    echo '<i class="glyphicon glyphicon-envelope"></i> Ihre Nachricht wurde an uns übermittelt, wir werden und umgehend mit Ihnen in Verbindung setzen.';
    echo '</div>';
} else {
    ?>
    <div class="well">
        <p>Zur Unterstützung unserer Initiative suchen wir immer neue Mitglieder, die uns tatkräftig bei der
            Organisation der Nachhilfe (dem Kontakt mit Schulen etc.) oder bei der Nachhilfe unterstützen. Deshalb
            suchen wir immer engagierte und zuverlässige Studenten, die sich dieser Aufgabe gewachsen fühlen.</p>
        <p>Wenn Du uns also unterstützen möchtest, dann fülle einfach das folgende Formular aus. So haben wir im Vorfeld
            einige Informationen, die uns bei der Planung weiterhelfen. Deine Daten behandeln wir selbstverständlich
            vertraulich.</p>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <form action="http://sfkvs.boehland.one/mitmachen/" method="post" role="form" class="form-horizontal">

                <input type="hidden" name="DATA[TITLE]" value="Mitmachformular">
                <input type="hidden" name="SOURCE_ID" value="WEB">
                <input type="hidden" name="STATUS_ID" value="NEW">
                <input type="hidden" name="SOURCE_DESCRIPTION" value="WebForm">

                <fieldset>
                    <legend>Einrichtung / Unternehmen (falls zutreffend)</legend>

                    <div class="form-group">
                        <label for="txtFirma" class="control-label col-sm-3">Bezeichnung:</label>

                        <div class="col-sm-9">
                            <input type="text" id="txtFirma" name="DATA[COMPANY_TITLE]" required
                                   placeholder="Unternehmen / Einrichtung..." class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="txtPosition" class="control-label col-sm-3">Position:</label>
                        <div class="col-sm-9">
                            <input type="text" id="txtPosition" name="DATA[POST]" required placeholder="Position"
                                   class="form-control">
                        </div>
                    </div>

                </fieldset>


                <fieldset>
                    <legend>Persönliche Angaben</legend>

                    <div class="form-group">
                        <label for="txtAnrede" class="control-label col-sm-3">Anrede:</label>

                        <div class="col-sm-9">
                            <select id="txtAnrede" name="DATA[Anrede]" required class="form-control"
                                    placeholder="Bitte wählen">
                                <option value="Frau">Frau</option>
                                <option value="Herr">Herr</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="txtName" class="control-label col-sm-3">Name:</label>

                        <div class="col-sm-4">
                            <input type="text" id="txtName" name="DATA[NAME]" required placeholder="Vorname"
                                   class="form-control">
                        </div>

                        <div class="col-sm-5">
                            <input type="text" id="txtNachname" name="DATA[LAST_NAME]" required placeholder="Nachname"
                                   class="form-control">
                        </div>
                    </div>

                </fieldset>

                <fieldset>
                    <legend>Anschrift</legend>

                    <div class="form-group">
                        <label for="txtStrasse" class="control-label col-sm-3">Straße:</label>
                        <div class="col-sm-9">
                            <input type="text" name="DATA[Strasse]" id="txtStrasse" required placeholder="Straße"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="txtPlz" class="control-label col-sm-3">PLZ / Ort:</label>

                        <div class="col-sm-2">
                            <input type="text" name="DATA[PLZ]" id="txtPLZ" required placeholder="PLZ"
                                   class="form-control">
                        </div>

                        <div class="col-sm-7">
                            <input type="text" id="txtOrt" name="DATA[Ort]" required placeholder="Ort"
                                   class="form-control">
                        </div>
                    </div>

                </fieldset>


                <fieldset>
                    <legend>Kommunikation</legend>

                    <div class="form-group">
                        <label for="txtTelefon" class="control-label col-sm-3">Telefon:</label>
                        <div class="col-sm-9">
                            <input type="tel" name="DATA[PHONE_WORK]" id="txtTelefon" required placeholder="Telefon"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="txtEmail" class="control-label col-sm-3">E-Mail:</label>
                        <div class="col-sm-9">
                            <input type="email" name="DATA[EMAIL_WORK]" id="txtEmail" required
                                   placeholder="E-Mail-Adresse" class="form-control">
                        </div>
                    </div>

                </fieldset>

                <fieldset>
                    <legend>Hochschule / Wunschfächer</legend>

                    <div class="form-group">
                        <label for="txtHochschule" class="control-label col-sm-3">Hochschule:</label>
                        <div class="col-sm-9">
                            <input type="text" id="txtHochschule" name="DATA[Hochschule]" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="txtStudiengang" class="control-label col-sm-3">Studiengang:</label>
                        <div class="col-sm-9">
                            <input type="text" id="txtStudiengang" name="DATA[Studiengang]" class="form-control">
                        </div>
                    </div>

                    <legend>Wunschfächer</legend>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-1">
                                <input type="checkbox" name="DATA[wunschfaecher][]" value="Mathe">
                            </div>
                            <label for="mathe">Mathe</label>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-1">
                                <input type="checkbox" name="DATA[wunschfaecher][]" value="Physik">
                            </div>
                            <label for="physik">Physik</label>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-1">
                                <input type="checkbox" name="DATA[wunschfaecher][]" value="Chemie">
                            </div>
                            <label for="chemie">Chemie</label>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-1">
                                <input type="checkbox" name="DATA[wunschfaecher][]" value="Biologie">
                            </div>
                            <label for="biologie">Biologie</label>
                        </div>


                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-1">
                                <input type="checkbox" name="DATA[wunschfaecher][]" value="Deutsch">
                            </div>
                            <label for="deutsch">Deutsch</label>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-1">
                                <input type="checkbox" name="DATA[wunschfaecher][]" value="Englisch">
                            </div>
                            <label for="englisch">Englisch</label>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-1">
                                <input type="checkbox" name="DATA[wunschfaecher][]" value="Französisch">
                            </div>
                            <label for="franzoesisch">Französisch</label>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-1">
                                <input type="checkbox" name="DATA[wunschfaecher][]" value="Spanisch">
                            </div>
                            <label for="spanisch">Spanisch</label>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-1">
                                <input type="checkbox" name="DATA[wunschfaecher][]" value="Italienisch">
                            </div>
                            <label for="italienisch">Italienisch</label>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-1">
                                <input type="checkbox" name="DATA[wunschfaecher][]" value="Latein">
                            </div>
                            <label for="latein">Latein</label>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-1">
                                <input type="checkbox" name="DATA[wunschfaecher][]" value="Altgriechisch">
                            </div>
                            <label for="altgriechisch">Altgriechisch</label>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-1">
                                <input type="checkbox" name="DATA[wunschfaecher][]" value="Wirtschaftskunde">
                            </div>
                            <label for="wirtschaftskunde">Wirtschaftskunde</label>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-1">
                                <input type="checkbox" name="DATA[wunschfaecher][]" value="Rechnungswesen">
                            </div>
                            <label for="rechnungswesen">Rechnungswesen</label>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-1">
                                <input type="checkbox" name="DATA[wunschfaecher][]" value="Geographie">
                            </div>
                            <label for="geographie">Geographie</label>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-1">
                                <input type="checkbox" name="DATA[wunschfaecher][]" value="Geschichte">
                            </div>
                            <label for="geschichte">Geschichte</label>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-1">
                                <input type="checkbox" name="DATA[wunschfaecher][]" value="Informatik">
                            </div>
                            <label for="informatik">Informatik</label>
                        </div>

                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="sonstige">Sonstige Fächer:</label>
                            </div>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" name="DATA[wunschfaecher][]" id="sonstige"
                                       placeholder="Sonstige Fächer...">
                            </div>
                        </div>
                    </div>

                </fieldset>

                <fieldset>
                    <legend>Einsatzort(e)</legend>

                    Mehrfachauswahl (STRG + Klick)<br>
                    <select multiple="multiple" class="form-control" name="DATA[Einsatzort][]">
                        <option>Schwenningen</option>
                        <option>Villingen</option>
                        <option>Furtwangen</option>
                    </select>
                </fieldset>

                <fieldset>
                    <legend>Zu diesen Zeiten könnte ich Nachhilfe geben</legend>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea name="DATA[Zeiten]" id="txtZeiten" placeholder="" class="form-control" rows="4"
                                      name="DATA[Zeiten]"></textarea>
                        </div>
                    </div>
                </fieldset>


                <fieldset>
                    <legend>Anmerkungen</legend>

                    <!--<div class="form-group">
                        <label for="txtBetreff" class="control-label col-sm-3">Betreff':</label>
                            <div class="col-sm-9">
                                <input type="text" name="DATA[TITLE]" id="txtBetreff" required placeholder="Betreff" class="form-control">
                            </div>
                    </div>-->

                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea name="DATA[COMMENTS]" id="txtNachricht" placeholder="Ihre Nachricht"
                                      class="form-control" rows="4"></textarea>
                        </div>
                    </div>

                </fieldset>

                <fieldset>
                    <legend>Datenschutzbestimmungen</legend>
                    <p>
                        Die Studenteninitiative für Kinder ("SfK") verarbeitet die in diesem Mitmachformular enthaltenen
                        Angaben zur Person ausschließlich für interne Zwecke. Nach §4 des Bundesdatenschutzgesetzes vom
                        14. August 2009 bedarf dies Deiner vorherigen Zustimmung, die Du ganz unten erteilen musst. Du
                        musst ebenfalls zustimmen, dass Du unsere Satzung in allen Teilen anerkennst, dass Du die im
                        Rahmen Deiner ehrenamtlichen Tätigkeit bei der SfK bekannt werdenden persönlichen Daten nur zur
                        Ausübung der ehrenamtlichen Tätigkeit bei der SfK verwendest und diese nicht an Dritte
                        weitergibst sowie dass Du gemäß §72a SGB VIII keine Vorstrafen hast bzw. ein Prozess
                        diesbezüglich gegen Dich am Laufen ist. Die SfK wird Deine persönlichen Daten unter strikter
                        Beachtung der Bestimmungen des Bundesdatenschutzgesetzes verarbeitet und diese nicht an Dritte
                        weitergeben.
                    </p>
                    <!--		<div class="alert alert-info">
                                <span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;Durch bestätigen des Captchas, akzeptieren Sie obige Datenschutzbestimmungen.
                            </div>
                            <div class="g-recaptcha form-group col-sm-9" data-sitekey="6LcyLQgUAAAAAFNME2enKoQUaOhpQSca_U7PLHNb"></div>-->
                </fieldset>

                <button type="reset" class="btn btn-default">
                    <span class="glyphicon glyphicon-erase"></span> Eingaben löschen
                </button>

                <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-envelope"></span> Nachricht senden
                </button>
            </form>
        </div><!-- END Col 6 -->
    </div>
<?php } ?>

<script src='https://www.google.com/recaptcha/api.js'></script>