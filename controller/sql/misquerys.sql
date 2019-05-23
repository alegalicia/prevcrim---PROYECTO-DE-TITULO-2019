
-- rank 5 comunas 
select count(sector.id_sector) as total_sector, delito_delincuente.id_delito, sector.sector, 
comuna.comuna   
from delito_delincuente
inner join comuna on delito_delincuente.id_comuna = comuna.id_comuna
LEFT JOIN sector on comuna.id_sector = sector.id_sector 
GROUP BY comuna.comuna 
ORDER by total_sector desc
limit 5 
select DATABASE(prevcrim)