<?php

namespace App\Exports;

use App\GeneLib;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Http\Resources\Filegenescurated;

use Carbon\Carbon;

class GenesCuratedExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $results = GeneLib::geneListForExportReport(['page' => 0,
										'pagesize' => 20000,
										'sort' => 'GENE_LABEL',
										'direction' => 'ASC',
										'search' => '',
                                        'curated' => true ]);

        foreach ($results->collection as $gene) {
            $haploinsufficiency_assertion = '';
            $triplosensitivity_assertion = '';
            $dosage_report = '';
            if (isset($gene->dosage_curation)) {
                //dd($gene->dosage_curation->haploinsufficiency_assertion->dosage_classification);
                    //foreach ($gene->dosage_curation as $dosage_curation) {
                        if(isset($gene->dosage_curation->haploinsufficiency_assertion->dosage_classification->ordinal)) {
                            $report_date = strtotime($gene->dosage_curation->report_date);
                            $report_date = date("m/d/Y", $report_date);
                            $haploinsufficiency_assertion .= "" . $gene->dosage_curation->haploinsufficiency_assertion->dosage_classification->ordinal . " - " . \App\GeneLib::haploAssertionString($gene->dosage_curation->haploinsufficiency_assertion->dosage_classification->ordinal ?? null) . " (" . $report_date .")";
                        }
                        if(isset($gene->dosage_curation->triplosensitivity_assertion->dosage_classification->ordinal)) {
                            $report_date = strtotime($gene->dosage_curation->report_date);
                            $report_date = date("m/d/Y", $report_date);
                    $triplosensitivity_assertion .= "" . $gene->dosage_curation->triplosensitivity_assertion->dosage_classification->ordinal . " - " . \App\GeneLib::haploAssertionString($gene->dosage_curation->triplosensitivity_assertion->dosage_classification->ordinal ?? null) . " (" . $report_date . ")";
                        }
                    //}
                    $dosage_report = route('dosage-show', $gene->hgnc_id);
            }

            if (isset($gene->genetic_conditions)) {
                foreach ($gene->genetic_conditions as $genetic_condition) {
                    //dd($genetic_condition->disease);

                    $mois = array();
                    $gene_validity_assertions_classifications = array();
                    $gene_validity_assertion_reports = array();
                    $actionability_assertion_classifications = array();
                    $actionability_assertions_reports = array();

                    if (isset($genetic_condition->gene_validity_assertions)) {
                        //dd("gene_validity_assertions");
                        foreach ($genetic_condition->gene_validity_assertions as $gene_validity_assertion) {
                            $report_date = strtotime($gene_validity_assertion->report_date);
                            $report_date = date("m/d/Y", $report_date);
                            $gene_validity_assertions_classifications[] = $gene_validity_assertion->classification->label . " (" . $report_date . ")";
                            $mois[] = $gene_validity_assertion->mode_of_inheritance->label;
                            $gene_validity_assertion_reports[] = route('validity-show', ['id' => $gene_validity_assertion->curie]);
                        }
                    }
                    if (isset($genetic_condition->actionability_assertions)) {

                        foreach ($genetic_condition->actionability_assertions as $actionability_assertions) {
                            $report_date = strtotime($actionability_assertions->report_date);
                            $report_date = date("m/d/Y", $report_date);
                            $actionability_assertion_classifications[] = $actionability_assertions->classification->label . " (" . $report_date . ")";
                            //$mois[] = $actionability_assertions->mode_of_inheritance->label;
                            $actionability_assertions_reports[] = route('validity-show', ['id' => $actionability_assertions->source]);
                        }
                    }
                    if($mois) {
                        $mois = implode(' | ', $mois);
                    } else {
                        $mois = "N/A";
                    }
                    $gene_validity_assertions_classifications = implode(' | ', $gene_validity_assertions_classifications);
                    $gene_validity_assertion_reports = implode(' | ', $gene_validity_assertion_reports);
                    $actionability_assertion_classifications = implode(' | ', $actionability_assertion_classifications);
                    $actionability_assertions_reports = implode(' | ', $actionability_assertions_reports);

                    $return[] = [
                        'gene_symbol' => $gene->label,
                        'hgnc_id' => $gene->hgnc_id,
                        'gene_url' => route('gene-show', ['id' => $gene->hgnc_id]),
                        'disease_label' => $genetic_condition->disease->label,
                        'mondo_id' => $genetic_condition->disease->curie,
                        'disease_url' => route('condition-show', ['id' => $genetic_condition->disease->curie]),
                        'mois' => $mois,
                        'haploinsufficiency_assertion' => $haploinsufficiency_assertion,
                        'triplosensitivity_assertion' => $triplosensitivity_assertion,
                        'dosage_report' => $dosage_report,
                        'gene_validity_assertion_classifications' => $gene_validity_assertions_classifications,
                        'gene_validity_assertion_reports' => $gene_validity_assertion_reports,
                        'actionability_assertion_classifications' => $actionability_assertion_classifications,
                        'actionability_assertion_reports' => $actionability_assertions_reports,
                    ];
                    //dd($return);
                }
            }
        }

        //dd($return);

        return Filegenescurated::collection($return);
    }

    public function headings(): array
    {
        return [
            ["FILE CREATED: " . Carbon::now()->format('Y-m-d')],
            ["gene_symbol", "hgnc_id", "gene_url", "disease_label", "mondo_id", "disease_url", "mode_of_inheritances", "gene_dosage_haploinsufficiency_assertion", "gene_dosage_triplosensitivity_assertion", "gene_dosage_report", "gene_disease_validity_assertion_classifications", "gene_disease_validity_assertion_reports", "actionability_assertion_classifications", "actionability_assertion_reports"],
        ];
    }
}
