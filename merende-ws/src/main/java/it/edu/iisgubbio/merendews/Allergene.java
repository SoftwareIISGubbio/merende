package it.edu.iisgubbio.merendews;

import java.util.Set;

import com.fasterxml.jackson.annotation.JsonBackReference;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.ManyToMany;

@Entity
public class Allergene {


	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	Integer id_allergene;
	
	@JsonBackReference
	@ManyToMany(mappedBy="allergene")
	Set<Prodotto> allergene_prodotto;

	String nome;

	public Integer getId() {
		return id_allergene;
	}

	public void setId(Integer id) {
		this.id_allergene = id;
	}

	public String getNome() {
		return nome;
	}

	public void setNome(String nome) {
		this.nome = nome;
	}

	public Integer getId_al() {
		return id_allergene;
	}

	public void setId_al(Integer id_allergene) {
		this.id_allergene = id_allergene;
	}

	public Set<Prodotto> getAllergene_prodotto() {
		return allergene_prodotto;
	}

	public void setAllergene_prodotto(Set<Prodotto> allergene_prodotto) {
		this.allergene_prodotto = allergene_prodotto;
	}

}
