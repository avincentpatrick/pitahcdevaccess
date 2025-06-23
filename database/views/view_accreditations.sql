select
f.id AS fid,
a.id AS aid,
case 
    when a.status_type_id = 1 and a.expiration_date > CURDATE()  then 1
    when a.status_type_id = 1 and a.expiration_date <= CURDATE()  then 2
    ELSE 3 end as status_type_id,   
a.application_sub_type_id AS application_sub_type_id,
mc.facility_type_id AS facility_type_id,
a.accreditation_code AS accreditation_code,
mc.modality_id AS modality_id,
a.modality_class_id AS modality_class_id,
a.entry_date AS entry_date,
a.expiration_date AS expiration_date,
f.facility_name AS facility_name,
f.prefix_id AS prefix_id,
f.last_name AS last_name,
f.first_name AS first_name,
f.middle_name AS middle_name,
f.suffix_id AS suffix_id,
f.citizenship_id AS citizenship_id,
f.sex_type_id AS sex_type_id,
f.foreign_managed_status_type_id AS foreign_managed_status_type_id,
f.filipino_physician_prefix_id AS filipino_physician_prefix_id,
f.filipino_physician_last_name AS filipino_physician_last_name,
f.filipino_physician_first_name AS filipino_physician_first_name,
f.filipino_physician_middle_name AS filipino_physician_middle_name,
f.filipino_physician_suffix_id AS filipino_physician_suffix_id,
f.filipino_physician_prc_id_number AS filipino_physician_prc_id_number,
f.filipino_physician_prc_expiration_date AS filipino_physician_prc_expiration_date,
f.landline AS landline,
f.mobile_number AS mobile_number,
f.business_number AS business_number,
f.email AS email,
f.region_id AS region_id,
f.province_id AS province_id,
f.city_id AS city_id,
f.barangay_id AS barangay_id,
f.address AS address,
a.created_by AS created_by,
a.updated_by AS updated_by,
a.created_at AS created_at,
a.updated_at AS updated_at 
from 
accreditations a 
left join facilities f on a.facility_id = f.id
left join modality_classes mc on a.modality_class_id = mc.id