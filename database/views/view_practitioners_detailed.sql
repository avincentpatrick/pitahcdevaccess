select 
p.id AS `practitioner_id`,
c.id AS `certification_id`,
st.status_type_name AS `status_type_name`,
p.last_name AS `last_name`,
p.first_name AS `first_name`,
p.middle_name AS `middle_name`,
(case when (p.primary_citizenship_id = 608) then 'FILIPINO' else 'FOREIGN' end) AS `nationality`,
ci.city_name AS `city_name`,
(case when (pr.region_id = 13) then 'METRO MANILA' else pr.province_name end) AS `province_name`,
re.region_name AS `region_name`,
mc.modality_class_name AS `modality_class_name`,
s.sex_type_name AS `sex_type_name`,
date_format(c.entry_date, '%M %d, %Y') AS `entry_date`,
c.entry_date AS `entry_date_raw`,
date_format(c.expiration_date, '%M %d, %Y') AS `expiration_date`,
c.expiration_date AS `expiration_date_raw`,
concat(mc.modality_class_code, '-',c.certification_code) AS `certification_code` 
from practitioners p 
left join certifications c on p.id = c.practitioner_id 
left join regions re on p.residential_region_id = re.id
left join provinces pr on p.residential_province_id = pr.id
left join cities ci on p.residential_city_id = ci.id
left join modality_classes mc on c.modality_class_id = mc.id
left join sex_types s on p.sex_type_id = s.id
left join status_types st on c.status_type_id = st.id
order by p.last_name, p.first_name