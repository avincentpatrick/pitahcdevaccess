select f.facility_name AS `facility_name`,
f.address AS `address`,
concat(coalesce(f.mobile_number, ''), 
    (case when f.mobile_number then '; ' else '' end),
coalesce(f.business_number, ''), 
    (case when f.business_number then '; ' else '' end),
coalesce(f.email, '')) AS `contact_details`,
ft.facility_type_name AS `facility_type_name`,
m.modality_name AS `modality_name` 
from facilities f 
left join accreditations ac on f.id = ac.facility_id 
left join modality_classes mc on ac.modality_class_id = mc.id
left join modalities m on mc.modality_id = m.id
left join facility_types ft on mc.facility_type_id = ft.id
where f.status_type_id = 1 and ac.status_type_id = 1
order by f.facility_name