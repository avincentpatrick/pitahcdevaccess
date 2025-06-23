    select
    f.id AS `facility_id`,
    ac.id AS `accreditation_id`,
    (case when (f.status_type_id = 1) then 'Active' else 'Inactive' end) AS `status_type_id`,
    f.facility_name AS `facility_name`,
    ft.facility_type_name AS `facility_type_name`,
    m.modality_name AS `modality_name`,
    f.address AS `address`,
    re.region_name AS `region_name`,
    pr.province_name AS `province_name`,
    f.mobile_number AS `mobile_number`,
    f.business_number AS `business_number`,
    f.email AS `email`,
    ac.entry_date AS `entry_date`,
    ac.expiration_date AS `expiration_date` 
    from facilities f 
    left join accreditations ac on f.id = ac.facility_id 
    left join modality_classes mc on ac.modality_class_id = mc.id
    left join modalities m on mc.modality_id = m.id 
    left join facility_types ft on mc.facility_type_id = ft.id
    left join regions re on f.region_id = re.id
    left join provinces pr on f.province_id = pr.id
    order by f.facility_name