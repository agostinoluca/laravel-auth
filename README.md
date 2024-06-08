<p align="center"><a href="https://github.com/agostinoluca?tab=repositories" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Laravel Boolfolio

#### nome repo: laravel-auth

## STEP 1 base: creiamo con Laravel il nostro sistema di gestione del nostro Portfolio di progetti.

Oggi iniziamo un nuovo progetto che si arricchirà nel corso delle prossime lezioni: man mano aggiungeremo funzionalità e vedremo la nostra applicazione crescere ed evolvere.
Rifate ciò che abbiamo visto insieme stasera stilando tutto a vostro piacere utilizzando bootstrap e css (da scrivere nel file app.scss).

### Descrizione

Ripercorriamo gli steps fatti a lezione ed iniziamo un nuovo progetto usando laravel breeze ed il pacchetto Laravel 9 Preset con autenticazione.
Iniziamo con il definire il layout, modello, migrazione, controller e rotte necessarie per il sistema portfolio:

1. Autenticazione: si parte con l'autenticazione e la creazione di un layout semplice per il back-office;
2. Creazione del modello Project con relativa migrazione, seeder, controller e rotte;
3. Per la parte di back-office creiamo un resource controller Admin\ProjectController per gestire tutte le operazioni CRUD dei progetti.

### Bonus

Implementiamo la validazione dei dati dei Progetti nelle operazioni CRUD che lo richiedono usando due form requests.

## STEP 2 Project Typology: aggiungiamo una nuova entità Type, questa entità rappresenta la tipologia di progetto ed è in relazione one to many con i progetti.

### Descrizione:

I task da svolgere sono diversi, ma alcuni di essi sono un ripasso di ciò che abbiamo fatto nelle lezioni dei giorni scorsi:

-   creare la migration per la tabella types;
-   creare il model Type;
-   creare la migration di modifica per la tabella projects per aggiungere la chiave esterna;
-   aggiungere ai model Type e Project i metodi per definire la relazione one to many;
-   visualizzare nella pagina di dettaglio di un progetto la tipologia associata, se presente;
-   permettere all’utente di associare una tipologia nella pagina di creazione e modifica di un progetto;
-   gestire il salvataggio dell’associazione progetto-tipologia con opportune regole di validazione.

### Bonus 1

Creare il seeder per il model Type.

### Bonus 2

Aggiungere le operazioni CRUD per il model Type, in modo da gestire le tipologie di progetto direttamente dal pannello di amministrazione.

## STEP 3 Project Technology: aggiungiamo una nuova entità Technology, questa entità rappresenta le tecnologie utilizzate ed è in relazione many to many con i progetti.

### Descrizione:

I task da svolgere sono diversi, ma alcuni di essi sono un ripasso di ciò che abbiamo fatto nelle lezioni dei giorni scorsi:

-   creare la migration per la tabella technologies;
-   creare il model Technology;
-   creare la migration per la tabella pivot project_technology;
-   aggiungere ai model Technology e Project i metodi per definire la relazione many to many;
-   visualizzare nella pagina di dettaglio di un progetto le tecnologie utilizzate, se presenti;
-   permettere all’utente di associare le tecnologie nella pagina di creazione e modifica di un progetto;
-   gestire il salvataggio dell’associazione progetto-tecnologie con opportune regole di validazione.

### Bonus 1

Creare il seeder per il model Technology.

### Bonus 2

Aggiungere le operazioni CRUD per il model Technology, in modo da gestire le tecnologie utilizzate nei progetti direttamente dal pannello di amministrazione.

## STEP 4 API: l’esercizio è suddiviso in milestone ed è importante che ne seguiate l’ordine.

### Milestone 1

Aggiungiamo al nostro progetto Laravel una nuovo Api/ProjectController.
Questo controller risponderà a delle richieste via API e si occuperà di restituire la lista dei progetti presenti nel database in formato json.

### Milestone 2

Testiamo la chiamata API tramite Postman e assicuriamoci di ricevere i dati correttamente.

## Proseguiamo con le milestones per il progetto API e creaiamo un'app con vue3 che vada a consumare le risorse esposte nella Milestone 2.

#### nome repo: vite-boolfolio

### Milestone 3

Iniziamo ad occuparci della parte front-office della nostra applicazione: creiamo un nuovo progetto Vue 3 con Vite e installiamo axios.
Colleghiamo questo progetto ad una repo separata.

### Milestone 4

Nel componente principale della nostra Vue App facciamo una chiamata API all’endpoint costruito nel progetto Laravel (milestone 1) e recuperiamo tutti i progetti dal nostro back-end.
Stampiamo in console i risultati e verifichiamo di ricevere i dati correttamente.

### Milestone 5

Creiamo un nuovo componente ProjectCard, che corrisponde ad una card per visualizzare un progetto. Utilizziamo questo componente per visualizzare tutti i progetti ricevuti tramite API.

### Bonus:

1. gestire la paginazione dei risultati;
2. creare una modale per visualizzare i dettagli del singolo post;
3. implementare il filtro search.
