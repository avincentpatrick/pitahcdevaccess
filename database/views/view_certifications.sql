select
p.id AS pid,
c.id AS cid,
case 
    when c.status_type_id = 1 and c.expiration_date > CURDATE()  then 1
    when c.status_type_id = 1 and c.expiration_date <= CURDATE()  then 2
    ELSE 3 end as status_type_id,   
c.application_sub_type_id AS application_sub_type_id,
c.certification_code AS certification_code,
mc.modality_id AS modality_id,
c.modality_class_id AS modality_class_id,
c.application_date AS application_date,
c.entry_date AS entry_date,
c.expiration_date AS expiration_date,
p.prefix_id AS prefix_id,
p.last_name AS last_name,
p.first_name AS first_name,
p.middle_name AS middle_name,
p.suffix_id AS suffix_id,
p.birth_date AS birth_date,
p.birth_place AS birth_place,
p.citizenship_status_type_id AS citizenship_status_type_id,
p.primary_citizenship_id AS primary_citizenship_id,
p.secondary_citizenship_id AS secondary_citizenship_id,
p.sex_type_id AS sex_type_id,
p.landline AS landline,
p.mobile_number AS mobile_number,
p.business_number AS business_number,
p.email AS email,
p.residential_region_id AS residential_region_id,
p.residential_province_id AS residential_province_id,
p.residential_city_id AS residential_city_id,
p.residential_barangay_id AS residential_barangay_id,
p.residential_address AS residential_address,
p.business_region_id AS business_region_id,
p.business_province_id AS business_province_id,
p.business_city_id AS business_city_id,
p.business_barangay_id AS business_barangay_id,
p.business_address AS business_address,
c.created_by AS created_by,
c.updated_by AS updated_by,
c.created_at AS created_at,
c.updated_at AS updated_at 
from 
certifications c 
left join practitioners p on c.practitioner_id = p.id
left join modality_classes mc on c.modality_class_id = mc.id