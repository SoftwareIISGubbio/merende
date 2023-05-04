package it.edu.iisgubbio.merendews;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;

@Entity
public class Prodotto {
    
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Integer id_prod;
    
    String nome;
    Double prezzo;
    
	public Integer getId() {
		return id_prod;
	}
	public void setId(Integer id) {
		this.id_prod = id;
	}
	public String getNome() {
		return nome;
	}
	public void setNome(String nome) {
		this.nome = nome;
	}
	public Double getPrezzo() {
		return prezzo;
	}
	public void setPrezzo(Double prezzo) {
		this.prezzo = prezzo;
	}

    /* il metodi set/get vanno inseriti per esercizio, magari usando Eclipse */
}