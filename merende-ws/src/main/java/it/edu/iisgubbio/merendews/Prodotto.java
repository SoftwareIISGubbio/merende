package it.edu.iisgubbio.merendews;

import java.util.Set;

import com.fasterxml.jackson.annotation.JsonManagedReference;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinTable;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToMany;

@Entity
public class Prodotto {

	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	Integer id_prodotto;

	@ManyToMany
	@JsonManagedReference
	@JoinTable(
			name = "allergene_prodotto", 
			joinColumns = @JoinColumn(name = "fk_id_prodotto"), 
			inverseJoinColumns = @JoinColumn(name = "fk_id_allergene"))
	Set<Allergene> allergene;
	
	@ManyToMany
	@JsonManagedReference
	@JoinTable(
			name = "promozione_prodotto", 
			joinColumns = @JoinColumn(name = "fk_id_prodotto"), 
			inverseJoinColumns = @JoinColumn(name = "fk_id_promozione"))
	Set<Promozione> promozione;

	String nome;
	Double prezzo;
	Integer calorie;
	Double grassi;
	Double zuccheri;
	Double proteine;

	public Integer getId() {
		return id_prodotto;
	}
	public void setId(Integer id) {
		this.id_prodotto = id;
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
	public Set<Allergene> getAllergene() {
		return allergene;
	}
	public void setAllergene(Set<Allergene> allergene) {
		this.allergene = allergene;
	}
	public Integer getCalorie() {
		return calorie;
	}
	public void setCalorie(Integer calorie) {
		this.calorie = calorie;
	}
	public Double getGrassi() {
		return grassi;
	}
	public void setGrassi(Double grassi) {
		this.grassi = grassi;
	}
	public Double getZuccheri() {
		return zuccheri;
	}
	public void setZuccheri(Double zuccheri) {
		this.zuccheri = zuccheri;
	}
	public Double getProteine() {
		return proteine;
	}
	public void setProteine(Double proteine) {
		this.proteine = proteine;
	}
}