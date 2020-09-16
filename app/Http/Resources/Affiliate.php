<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Affiliate extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'agent' => basename($this->iri),
            'label' => $this->label,
            'curie' => $this->curie,
            'count' => $this->gene_validity_assertions->count ?? 0
            //'curations' => $this->mapCurations()
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
