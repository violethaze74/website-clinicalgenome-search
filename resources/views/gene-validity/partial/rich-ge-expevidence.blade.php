<div class="panel panel-default" id="tag_experimental_evidence">
    <div class="panel-heading bg-evidence5" role="tab" id="expevid"">
        <h4 class="mb-0 mt-0">EXPERIMENTAL EVIDENCE <span class="pull-right small">Total Points:  <u>{{ $exp_count ?? 'N/A' }}</u></span></h4>
        &nbsp;
        <div class="pull-right">
            <a data-toggle="collapse" data-parent="#tag_experimental_evidence" href="#tablefive" aria-expanded="true" aria-controls="tablefive">
                <i class="fas fa-compress-arrows-alt"></i>
            </a>
        </div>
    </div>
    <div id="tablefive" class="panel-collapse expand collapse in" role="tabpanel" aria-labelledby="expevid">
        <div class="panel-body">
            @if (empty($extrecord->experimental_evidence))
                <div class="alert alert-warning" role="alert">
                    No experimental evidence was found.
                </div>
            @else
                <div class="table-responsive light-arrows">
                    <!-- START DEMO DATA -->
                    <table id="table" role="table" class="table table-validity-data table-bordered small table-striped table-hover"
                        data-classes="table"
                            data-locale="en-US"
                            data-addrbar="true"
                            data-search="true"
                            data-filter-control="true"
                            data-filter-control-visible="false"
                            data-id-table="advancedTable"
                            data-search-align="left"
                            data-trim-on-search="true"
                            data-sort-order="asc"
                            data-sort-name="label"
                            data-show-search-clear-button="true"
                            data-buttons="table_buttons"
                            data-show-align="left"
                            data-show-fullscreen="true"
                            data-show-columns="true"
                            data-show-columns-toggle-all="true"
                            data-search-formatter="false"
                            data-show-export="true"
                            data-export-types="['json', 'xml', 'csv', 'txt', 'sql', 'xlsx', 'pdf']"
                            data-minimum-count-columns="2"
                            data-pagination="true"
                            data-id-field="id"
                            {{-- data-ajax-options="ajaxOptions" --}}
                            data-page-list="[10, 25, 50, 100, 250, all]"
                            data-page-size="{{ $display_list ?? 25 }}"
                            data-show-footer="false"
                            data-side-pagination="client"
                            data-pagination-v-align="both"
                            data-show-extended-pagination="false"
                            {{-- data-url="{{  $apiurl }}" --}}
                            data-query-params="queryParams"
                            data-response-handler="responseHandler"
                            data-header-style="headerStyle"
                            data-show-filter-control-switch="true"
                            data-group-by="true"
                            data-group-by-field="pheno">
                        <thead>
                            <tr role="row">
                                <th data-cell-style="cellFormatter" data-filter-control="input" data-sortable="true" data-field="label">Label</th>
                                <th data-cell-style="cellFormatter" data-filter-control="input" data-sortable="true">Experimental Category</th>
                                <th data-cell-style="cellFormatter" data-filter-control="input" data-sortable="true">Reference</th>
                                <th data-cell-style="cellFormatter" data-filter-control="input" data-sortable="true">Explanation</th>
                                <th data-cell-style="cellFormatter" data-filter-control="input" data-sortable="true">Score Status</th>
                                <th data-cell-style="cellFormatter" data-filter-control="input" data-sortable="true">Points (default points)</th>
                                <th data-cell-style="cellFormatter" data-filter-control="input" data-sortable="true">Reason for Changed Score</th>
                            </tr>
                        </thead>
                        <tbody role="rowgroup">
                            @foreach($extrecord->experimental_evidence as $record)
                            <tr>
                                <td class="vertical-align-center" role="cell" style="word-break: normal;">
                                    {{ $record->evidence[0]->label }}
                                </td>
                                <td class="vertical-align-center" role="cell"><span class="" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ App\Validity::evidenceTypePopupString($record->type[0]->curie ?? '') }}">
                                    {{ App\Validity::evidenceTypeString($record->type[0]->curie ?? '') }}</span><div><i class="fas fa-info-circle text-muted"></i></div>
                                </td>
                                <td class="vertical-align-center" role="cell">
                                    @if (empty($record->evidence[0]->source))
                                    <span class="text-danger"><strong>ERROR:  Missing evidence->source structure</strong></span>
                                    @else
                                    {!! displayCitation($record->evidence[0]->source) !!}
                                    @if (in_array($record->evidence[0]->source->curie, $extrecord->eas))
                                    <div><span data-toggle="popover" data-placement="top" data-trigger="hover" data-content="The article is selected as earliest report of a variant in the gene causing the disease of interest in a human"><i class="fas fa-check-square text-success"></i></span></div>
                                    @endif
                                    @endif
                                </td>
                                <td class="vertical-align-center" role="cell" style="max-width: 600px;">
                                    {{ $record->evidence[0]->description }}
                                </td>
                                <td class="vertical-align-center" role="cell">
                                    Score
                                </td>
                                <td class="vertical-align-center" role="cell">
                                    <span><strong>{{ $record->score }}</strong> ({{ $record->calculated_score }})</span>
                                </td>
                                <td class="vertical-align-center" role="cell" style="max-width: 600px;">
                                    {{  $record->description }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
    <div class="panel-footer text-right bg-evidence5">
        <b>Total Points:  {{ $exp_count ?? 'N/A' }}</b>
    </div>
</div>
