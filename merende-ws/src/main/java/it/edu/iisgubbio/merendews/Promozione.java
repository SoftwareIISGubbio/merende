package it.edu.iisgubbio.merendews;

import java.sql.Date;
import java.util.Set;

import com.fasterxml.jackson.annotation.JsonBackReference;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.ManyToMany;

@Entity
public class Promozione {
    
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Integer id_promozione;
    
    @JsonBackReference
	@ManyToMany(mappedBy="promozione")
	Set<Prodotto> promozione_prodotto;
    
    String descrizione;
    Date inizio;
    Date fine;

	public Integer getId() {
		return id_promozione;
	}

	public void setId(Integer id) {
		this.id_promozione = id;
	}

	public String getDescrizione() {
		return descrizione;
	}

	public void setDescrizione(String descrizione) {
		this.descrizione = descrizione;
	}

	public Date getInizio() {
		return inizio;
	}

	public void setInizio(Date inizio) {
		this.inizio = inizio;
	}

	public Date getFine() {
		return fine;
	}

	public void setFine(Date fine) {
		this.fine = fine;
	}

    /* il metodi set/get vanno inseriti per esercizio, magari usando Eclipse */
}