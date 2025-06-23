SELECT
SUM(case when a.status_type_id=1 then 1 ELSE 0 END) AS `total_accredited`,
SUM(case when a.status_type_id=1 AND a.expiration_date > CURDATE() then 1 ELSE 0 END) AS `total_accredited_active`,
SUM(case when a.status_type_id=1 AND a.expiration_date <= CURDATE() then 1 ELSE 0 END) AS `total_accredited_expired`,
(SELECT COUNT(*) AS `total_accredited_multiple_accreditations` FROM (SELECT COUNT(a.id) AS `count` FROM accreditations a WHERE a.status_type_id=1 GROUP BY a.facility_id HAVING COUNT(a.id) > 1) as `total_accredited_multiple_accreditations`) as `total_accredited_multiple_accreditations`,

SUM(case when a.status_type_id=1 AND a.modality_class_id=57 then 1 ELSE 0 END) AS `total_accredited_atc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=58 then 1 ELSE 0 END) AS `total_accredited_atcc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=40 then 1 ELSE 0 END) AS `total_accredited_ac`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=41 then 1 ELSE 0 END) AS `total_accredited_acc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=7 then 1 ELSE 0 END) AS `total_accredited_toac`,

SUM(case when a.status_type_id=1 AND a.modality_class_id=61 then 1 ELSE 0 END) AS `total_accredited_ctc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=44 then 1 ELSE 0 END) AS `total_accredited_cc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=70 then 1 ELSE 0 END) AS `total_accredited_toc`,

SUM(case when a.status_type_id=1 AND a.modality_class_id=62 then 1 ELSE 0 END) AS `total_accredited_htca`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=63 then 1 ELSE 0 END) AS `total_accredited_htcb`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=64 then 1 ELSE 0 END) AS `total_accredited_htcc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=45 then 1 ELSE 0 END) AS `total_accredited_hhca`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=46 then 1 ELSE 0 END) AS `total_accredited_hhcb`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=47 then 1 ELSE 0 END) AS `total_accredited_hhcc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=48 then 1 ELSE 0 END) AS `total_accredited_hhcd`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=71 then 1 ELSE 0 END) AS `total_accredited_toh`,

SUM(case when a.status_type_id=1 AND a.modality_class_id=65 then 1 ELSE 0 END) AS `total_accredited_hhxtc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=49 then 1 ELSE 0 END) AS `total_accredited_hhxc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=50 then 1 ELSE 0 END) AS `total_accredited_hhxcc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=72 then 1 ELSE 0 END) AS `total_accredited_tohh`,

SUM(case when a.status_type_id=1 AND a.modality_class_id=66 then 1 ELSE 0 END) AS `total_accredited_ntc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=67 then 1 ELSE 0 END) AS `total_accredited_ntcc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=51 then 1 ELSE 0 END) AS `total_accredited_ncf`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=52 then 1 ELSE 0 END) AS `total_accredited_ncfc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=73 then 1 ELSE 0 END) AS `total_accredited_ton`,

SUM(case when a.status_type_id=1 AND a.modality_class_id=68 then 1 ELSE 0 END) AS `total_accredited_otc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=53 then 1 ELSE 0 END) AS `total_accredited_oc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=74 then 1 ELSE 0 END) AS `total_accredited_too`,

SUM(case when a.status_type_id=1 AND a.modality_class_id=24 then 1 ELSE 0 END) AS `total_accredited_tcmtc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=25 then 1 ELSE 0 END) AS `total_accredited_tcmc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=75 then 1 ELSE 0 END) AS `total_accredited_totcm`,

SUM(case when a.status_type_id=1 AND a.modality_class_id=38 then 1 ELSE 0 END) AS `total_accredited_tmtcc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=54 then 1 ELSE 0 END) AS `total_accredited_tmtc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=55 then 1 ELSE 0 END) AS `total_accredited_tmc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=56 then 1 ELSE 0 END) AS `total_accredited_tmcc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=76 then 1 ELSE 0 END) AS `total_accredited_totm`,

SUM(case when a.status_type_id=1 AND a.modality_class_id=59 then 1 ELSE 0 END) AS `total_accredited_amtc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=42 then 1 ELSE 0 END) AS `total_accredited_amc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=77 then 1 ELSE 0 END) AS `total_accredited_toam`,

SUM(case when a.status_type_id=1 AND a.modality_class_id=60 then 1 ELSE 0 END) AS `total_accredited_alitc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=43 then 1 ELSE 0 END) AS `total_accredited_aycc`,
SUM(case when a.status_type_id=1 AND a.modality_class_id=78 then 1 ELSE 0 END) AS `total_accredited_toa`,

SUM(case when a.status_type_id=1 AND mc.modality_id=1 then 1 ELSE 0 END) AS `total_accredited_acupunture`,
SUM(case when a.status_type_id=1 AND mc.modality_id=2 then 1 ELSE 0 END) AS `total_accredited_chiropractic`,
SUM(case when a.status_type_id=1 AND mc.modality_id=3 then 1 ELSE 0 END) AS `total_accredited_hilot`,
SUM(case when a.status_type_id=1 AND mc.modality_id=4 then 1 ELSE 0 END) AS `total_accredited_homeopathy`,
SUM(case when a.status_type_id=1 AND mc.modality_id=5 then 1 ELSE 0 END) AS `total_accredited_naturopathy`,
SUM(case when a.status_type_id=1 AND mc.modality_id=6 then 1 ELSE 0 END) AS `total_accredited_osteopathy`,
SUM(case when a.status_type_id=1 AND mc.modality_id=7 then 1 ELSE 0 END) AS `total_accredited_tcm`,
SUM(case when a.status_type_id=1 AND mc.modality_id=8 then 1 ELSE 0 END) AS `total_accredited_tuina`,
SUM(case when a.status_type_id=1 AND mc.modality_id=9 then 1 ELSE 0 END) AS `total_accredited_anthroposophic`,
SUM(case when a.status_type_id=1 AND mc.modality_id=10 then 1 ELSE 0 END) AS `total_accredited_ayurveda`

FROM accreditations a
LEFT JOIN facilities f ON a.facility_id=f.id
LEFT JOIN modality_classes mc on a.modality_class_id=mc.id