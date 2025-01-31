<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\GeneLib;

class Validity extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $temp = Genelib::ValidityClassificationString($this->classification->label);

        if ($this->animal_model_only)
            $temp .= '*';

        return [
            'symbol' => $this->gene->label,
            'hgnc_id' => $this->gene->hgnc_id,
            //'href' => $this->href,
            'ep' => $this->attributed_to->label ?? '',
            'disease' => displayMondoLabel($this->disease->label) . '  ' . displayMondoObsolete($this->disease->label),
            'mondo' => $this->disease->curie,
            'moi' => $this->displayMoi($this->mode_of_inheritance->curie),
            'sop' => Genelib::ValidityCriteriaString($this->specified_by->label),
            'classification' => $temp,
            'order' => Genelib::ValiditySortOrder($temp),
            'perm_id' => $this->curie,
            'animal_model_only' => $this->animal_model_only,
            'report_id' => $this->report_id ?? null,
            'released' => $this->displayDate($this->report_date),
            'date' => $this->report_date
        ];
    }


    /**
     *
     * Map the node structure to a json consumable array
     *
     */
    protected function mapCurations()
    {
		if (empty($this->curations))
			return [];

		foreach($this->curations as $node)
		{
			$map = $node->values();
			$map['labels'] = $node->labels();
			$curations[] = $map;
		}

		return $curations;
	}
}
