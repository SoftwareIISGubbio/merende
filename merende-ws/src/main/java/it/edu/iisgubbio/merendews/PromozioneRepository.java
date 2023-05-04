package it.edu.iisgubbio.merendews;

import java.util.List;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

public interface PromozioneRepository extends JpaRepository<Promozione, Integer>{
    @Query(value="SELECT *  "+
            "FROM promozione "+
            "WHERE promozione.id_pro LIKE :promozione", 
       nativeQuery=true)
    List<Promozione> cerca(@Param("promozione") String parteDelCosa);
}