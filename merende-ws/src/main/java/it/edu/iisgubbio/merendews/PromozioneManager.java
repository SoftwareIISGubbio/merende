package it.edu.iisgubbio.merendews;

import java.sql.Date;
import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Example;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

@CrossOrigin
@RestController
public class PromozioneManager {

    @Autowired
    PromozioneRepository repoToDo;

    @GetMapping("/promozione/elenco")
    public List<Promozione> elenco() {
        List<Promozione> k = repoToDo.findAll();
        return k;
    }

    @GetMapping("/promozione")
    public List<Promozione> cerca(
    	@RequestParam(required = false) Integer id,
        @RequestParam(required = false) String descrizione,
        @RequestParam(required = false) Date inizio,
        @RequestParam(required = false) Date fine
    ) {
    	Promozione t = new Promozione();
        t.setId(id);
        t.setDescrizione(descrizione);
        t.setInizio(inizio);
        t.setFine(fine);
        Example<Promozione> example = Example.of(t);
        return repoToDo.findAll( example );
    }
    
    

   /*@GetMapping("/promozione/cerca2")
    public List<Promozione> cercaParte( @RequestParam String descrizione){
        return repoToDo.cerca("%"+descrizione+"%");
    }*/

   @GetMapping("/promozione/{id}")
    public Optional<Promozione> prendiPerChiave( @PathVariable int id ) {
        return repoToDo.findById(id);
    }
}