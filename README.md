# dpb
sviluppo per dpbroker
------------------------
parto da una configurazione funzionante per correggere la gestione dei mandati:
estraggo dal record mandati tutti i campi delle provvigioni per tiporischio e ne faccio una tabella a parte,
con chiave composta da id_mandato e id_tiporischio e unico campo l'importo della provvigione.
Successivamente devo modificare l'inserimento di un mandato e la ricerca della provvigione per tiporischio quando
si carica una polizza.
subito dopo elimino anche i tre campi IBAN dal mandato e ne faccio una tabella a parte.
