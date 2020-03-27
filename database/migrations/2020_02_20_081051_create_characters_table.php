<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //character value table:
    /**
     * elements
     * str, def, speed, taijutsu, ninja, genju, chakra, ausdauer , lern
     * 
     * 
     * Trainingstabelle
     * trainingsadi3 bis zu welchen wert
     * trainingsadi2 + trainingsadi was man trainiert // kann weg
     * Dauer Bis
     * Lastupdate eventuell mergen with 
     * lasttrain rpg gegeben + lastraingot rpg bekommen
     * Trainingspunkte (TPJouWechsel war für team aktivität training , eventuell nicht mehr genutzt)
     * rangTP bei Rangaufstieg speziel umgewandelt um sperre zu umgehen
     * tplf lernfähigkeiten , nit sicher wie 
     * 
     * 
     * prüfen für account persistent values
     * APGesamt
     * Aktivitätspunkte // eventuell in eine acc übersicht 
     * Bonustage // eventuell in eine acc übersicht
     * AP Monat , man kann nur 16 umtauschen pro monat daher speichern
     * Tageback für charactor tod
     * CenterPunkte
     * Geldplus für geldänderungen die außerordentlich waren, wie chara spendengeld
     * 
     * 
     * Account Statisk
     * Spielleiter,
     * Moderator
     * gelesen = diesen monat logs gelesen
     * gelesen_last = logs im last monat gelesen
     * maxRang maximaler rank den man hatte
     * maxNiveau max den man je mit 1 char hatte
     * TBT sind theoretische Bonus Tage
     * APMoney wieviel AP in Geldgewandelt worden
     */

    /**
     * LFForum + Forum erlaubsnis, später bei forum prüfen aber wahrscheinlich in account tabellen
     * bundniszugang später auch für forum prüfungstabelle
     * 
     */

    /**
     * char inventar tabelle
     * spezinventar ist aktueller stand frei text, rich text editor
     * spezinv new ist zuu prüfendes neues inventar sollte alten value
     * komminewinv = von admin kommentar zum neuen inv
     * Spezinventar2 eventuell unnötig da wie spez1
     */

    /**
     * rp und missionen
     * kämpfe siege, unentschieden, niederlage, rp missionen + system missionen
     * 
     */

    /**
     * character_setting für admins
     * 
     * plusGP
     * niveau sperre
     * niveauminus wenn man besonders viel scheiße gebaut hat
     */

    /**
     * bluterben dinger in eigene tabelle abstract
     * besönderheiten eventuell für vor oder nachteile
     * startsha = startsharingan
     * zwillingsnamen 
     * inuzuka tiererstellt
     * ClanTP = bonus tp nur für clan stuff ausgebar, zählen bis 0
     */

    /**
     * Character details, plus checks (CheckStatus)? bychecked
     * 
     */

    /**
     * Spezi, spezielle regeln, besondere eigene entwicklungen eventuell, oder fähigkeiten, schiebs hinaus in die zukunft
     * gemeldet eventuell seperate umsatzung prüfen eventguell charater admin bereich
     * meldeverbot siehe oben
     */

    /**
     * reise nicht mehr relevant, nm == neue message , zeigen, chatfarbe, chatadmin(eventuell dummy), LandesOberhaupt raus, in Landestabelle
     * NPC kann auch raus, eventuell später wie chara speichern
     * 
     * Besos Freitext Feld für Bekannt für
     * 
     * NPCPunkte + NPCMission eventuell nicht mehr notwendig
     * 
     * Puppet + Marionetten später
     * 
     * Rangwert ist id des ranges und retundant
     * 
     * Inaktivität eventuell nicht mehr notwendig, beided eher account
     * LastPM gekoppelt an inaktivätit, später prüfen,  beided eher account
     * 
     * Werthalter unbekannt sehr wahrscheinlich unnötig
     * 
     * Diagramm eventuell unnötig spätere prüfung
     * 
     * Notizen eventuell account binden, prio low
     * 
     * Eintra Eintralast eventuell zu nen amt , genaue funktion muss geklärt werden, wahrscheinlich admin aktivität geprüft
     * Trainfest unnötig
     * 
     * 20 Fragen in eigene tabelle wahrscheinlich als json, aber prüfen
     * 
     * Teilerdurchschnitt kann wech, war für npc
     * Spielerdurcschnitt eventuell sinnlos
     * 
     * Neuerungen eher account gebundne zur zeit timestamp wann zuletzt geprüft
     * readInboxStatus eher account, für nachrichten flag
     * 
     * alert fliegt raus, weils nervig war
     * 
     * EETPPlus eventuell nicht mehr notwendig
     * doubleup noch unsicher aber sehr wichtig, bezieht sich auf anzahl der doppelte trainingsupdate
     * 
     * DorfTP bonuspunkte für den start, wenn ein dorf recht leer ist, eventuell unnötig da einmalig
     * 
     * Taiold, Ninold, Genold können wech
     * NinGenTaiautoset brauch tiefere prüfung, eventuell unnötig
     * 
     * allUp nur relevant für taijuts oder schlechtechakra controlle , muss nicht beim character stehen, solange die vor und nachteile bekannt sind
     * ntWertselected 1 = für TP malus gezahlt, eventuell andere tabelle
     * 
     * PunkteTP aktuell sind TB die bei erstellung über sind
     * PunktTPMax siehe eins drüber
     * 
     * 
     * siehe Besonderheiten Tabelle für vor und nachteile
     */
    public function up()
    {
        Schema::create('character', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}