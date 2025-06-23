select p.last_name AS `last_name`,
p.first_name AS `first_name`,
p.middle_name AS `middle_name`,
ci.city_name AS `city_name`,
(case when (pr.region_id = 13) then 'METRO MANILA' else pr.province_name end) AS `province_name`,
mc.modality_class_name AS `modality_class_name` 
from practitioners p 
left join certifications c on p.id = c.practitioner_id
left join provinces pr on p.residential_province_id = pr.id
left join cities ci on p.residential_city_id = ci.id
left join modality_classes mc on c.modality_class_id = mc.id
where p.status_type_id = 1 and  c.status_type_id = 1 
order by p.last_name, p.first_name