package it.edu.iisgubbio.merendews;

import java.util.Set;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.ManyToMany;

@Entity
public class Allergene {
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	Integer id_al;
	
	/*@ManyToMany(mappedBy="allergeni")
	Set<Prodotto> prodotto_allergene;
*/
	String nome;

	public Integer getId() {
		return id_al;
	}

	public void setId(Integer id) {
		this.id_al = id;
	}

	public String getNome() {
		return nome;
	}

	public void setNome(String nome) {
		this.nome = nome;
	}

	public Integer getId_al() {
		return id_al;
	}

	public void setId_al(Integer id_al) {
		this.id_al = id_al;
	}

	/*public Set<Prodotto> getProdotto_allergene() {
		return prodotto_allergene;
	}

	public void setProdotto_allergene(Set<Prodotto> prodotto_allergene) {
		this.prodotto_allergene = prodotto_allergene;
	}*/

}
