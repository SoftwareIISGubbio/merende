package it.edu.iisgubbio.merendews;

import java.util.List;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

public interface ProdottoRepository extends JpaRepository<Prodotto, Integer>{
    @Query(value="SELECT *  "+
            "FROM prodotto "+
            "WHERE prodotto.id_prod LIKE :parte", 
       nativeQuery=true)
    List<Prodotto> cerca(@Param("parte") String parteDelCosa);
}