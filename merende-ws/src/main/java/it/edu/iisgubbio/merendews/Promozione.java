package it.edu.iisgubbio.merendews;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;

@Entity
public class Promozione {
    
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Integer id_pro;
    
    String descrizione;

	public Integer getId() {
		return id_pro;
	}

	public void setId(Integer id) {
		this.id_pro = id;
	}

	public String getDescrizione() {
		return descrizione;
	}

	public void setDescrizione(String descrizione) {
		this.descrizione = descrizione;
	}

    /* il metodi set/get vanno inseriti per esercizio, magari usando Eclipse */
}