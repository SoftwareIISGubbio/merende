package it.edu.iisgubbio.merendews;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Example;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import com.fasterxml.jackson.annotation.JsonIgnoreProperties;

@CrossOrigin
@RestController
@JsonIgnoreProperties

public class ProdottoManager {

    @Autowired
    ProdottoRepository repoToDo;

    @GetMapping("/prodotto/elenco")
    public List<Prodotto> elenco() {
        List<Prodotto> k = repoToDo.findAll();
        return k;
    }

    @GetMapping("/prodotto")
    public List<Prodotto> cerca(
    	@RequestParam(required = false) Integer id,
        @RequestParam(required = false) String nome,
        @RequestParam(required = false) Double prezzo,
        @RequestParam(required = false) Integer calorie,
        @RequestParam(required = false) Double grassi,
        @RequestParam(required = false) Double zuccheri,
        @RequestParam(required = false) Double proteine
    ) {
    	Prodotto t = new Prodotto();
        t.setId(id);
        t.setNome(nome);
        t.setPrezzo(prezzo);
        t.setCalorie(calorie);
        t.setGrassi(grassi);
        t.setProteine(proteine);
        t.setZuccheri(zuccheri);
        Example<Prodotto> example = Example.of(t);
        return repoToDo.findAll( example );
    }

    

    /*@GetMapping("/prodotto/cerca2")
    public List<Prodotto> cercaParte( @RequestParam String nome){
        return repoToDo.cerca("%"+nome+"%");
    }*/


    @GetMapping("/prodotto/{id}")
    public Optional<Prodotto> prendiPerChiave( @PathVariable int id ) {
        return repoToDo.findById(id);
    }

}