@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
      <div class="col-md-12 curated-genes-table">
      <table class="mt-3 mb-2">
        <tr>
          <td class="valign-top"><h1 class="h2 p-0 m-0">ClinGen Summary Statitics</h1>
            <h6><em>Last updated: {{ $metrics->display_date }}</em></h6>
          </td>
        </tr>
      </table>
      <div class="small">
        {{-- <a href="#gene" class="pr-2">Gene Level <i class="fas fa-arrow-circle-down"></i></a>
        <a href="#variant" class="pr-2">Variant Level <i class="fas fa-arrow-circle-down"></i></a> --}}
        <a href="#summary" class="pr-2">Curation Summary Statistics <i class="fas fa-arrow-circle-down"></i></a>
        <a href="#gene-disease-validity" class="pr-2">Gene-Disease Validity <i class="fas fa-arrow-circle-down"></i></a>
        <a href="#dosage-sensitivity" class="pr-2">Dosage Sensitivity <i class="fas fa-arrow-circle-down"></i></a>
        <a href="#clinical-actionability" class="pr-2">Clinical Actionability <i class="fas fa-arrow-circle-down"></i></a>
        <a href="#variant-vathogenicity" class="pr-2">Variant Pathogenicity	<i class="fas fa-arrow-circle-down"></i></a>
        {{-- <a href="#download">DOWNLOAD <i class="fas fa-arrow-circle-down"></i></a> --}}
      </div>
      <hr />
      </div>

      <div class="col-md-12">
        <h2 id="summary" class="text-center h1  font-weight-light">ClinGen Curation Summary Statistics</h2>
        <div class="row text-center">
          <div class="col-sm-4 col-sm-offset-2">
            <div class="text-size-lg lineheight-tight">{{ $metrics->values[App\Metric::KEY_TOTAL_CURATED_GENES] ?? '' }}</div>
            <div class=" lineheight-tight">Unique genes  with<br /> at least one curation</div>
          </div>
          <div class="col-sm-4">
            <div class="text-size-lg lineheight-tight">{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_UNIQUE] ?? '' }}</div>
            <div class=" lineheight-tight">Unique variants  with<br /> at least one curation</div>
          </div>
        </div>
        <div class="row text-center mt-4">
            <div class="col-md-3 col-sm-6">
              <div class="panel panel-default border-primary">
                <div class="panel-body border-bottom-1 p-2">
                  <a href="#gene-disease-validity" class="pr-2 text-dark">
                    <div class="">
                      <img src="https://www.clinicalgenome.org/site/assets/files/1142/untitled-1_icon-gene-interface_color.600x600.png" width="50px" />
                    </div>
                    <strong>Gene-Disease Validity</strong>
                    {{-- <i class="fas fa-arrow-circle-down"></i> --}}
                  </a>
                </div>
                <div class="panel-body row px-2 py-0">
                  <div class="col-xs-6 lineheight-tight py-3 px-2">
                    <div class="text-size-md lineheight-tight">{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_CURATIONS] ?? '' }}</div>
                    {{-- <div class="small lineheight-tight">Total number of curations</div> --}}
                    <div class="small lineheight-tight">Total reports <div class="text-10px">(Number of curations<br /> for this activity)</div></div>

                  </div>
                  <div class="col-xs-6 lineheight-tight py-3 px-2 border-left-1">
                    <div class="text-size-md">{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GENES] ?? '' }}</div>
                    <div class="small lineheight-tight">Unique genes <div class="text-10px">(Total genes with at<br /> least one curation)</div></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="panel panel-default border-primary">
                <div class="panel-body border-bottom-1 p-2">
                  <a href="#dosage-sensitivity" class="pr-2 text-dark">
                    <div class="">
                      <img src="https://www.clinicalgenome.org/site/assets/files/1145/untitled-1_icon-dosage-interface_color.600x600.png" width="50px" />
                    </div>
                    <strong>Dosage Sensitivity</strong>
                    {{-- <i class="fas fa-arrow-circle-down"></i> --}}
                  </a>
                </div>
                <div class="panel-body row px-2 py-0">
                  <div class="col-xs-6 lineheight-tight py-3 px-2">
                    <div class="text-size-md lineheight-tight">{{ $metrics->values[App\Metric::KEY_TOTAL_DOSAGE_CURATIONS] ?? '' }}</div>
                    <div class="small lineheight-tight">Total reports <div class="text-10px">(Number of curations<br /> for this activity)</div></div>
                  </div>
                  <div class="col-xs-6 lineheight-tight py-3 px-2 border-left-1">
                    <div class="text-size-md">{{ $metrics->values[App\Metric::KEY_TOTAL_DOSAGE_GENES] ?? '' }}</div>
                    <div class="small lineheight-tight">Unique genes <div class="text-10px">(Total genes with at<br /> least one curation)</div></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="panel panel-default border-primary">
                <div class="panel-body border-bottom-1 p-2">
                  <a href="#clinical-actionability" class="pr-2 text-dark">
                    <div class="">
                      <img src="https://www.clinicalgenome.org/site/assets/files/1144/untitled-1_icon-actionability-interface_color.600x600.png" width="50px" />
                    </div>
                    <strong>Clinical Actionability</strong>
                    {{-- <i class="fas fa-arrow-circle-down"></i> --}}
                  </a>
                </div>
                <div class="panel-body row px-2 py-0">
                  <div class="col-xs-6 lineheight-tight py-3 px-2">
                    <div class="text-size-md lineheight-tight">
                     {{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_REPORTS] ?? '' }}
                    </div>
                    <div class="small lineheight-tight">Total reports <div class="text-10px">(Number of reports<br /> for this activity)</div></div>
                  </div>
                  <div class="col-xs-6 lineheight-tight py-3 px-2 border-left-1">
                    <div class="text-size-md">
                      {{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_GENES] ?? '' }}
                    </div>
                    <div class="small lineheight-tight">Unique genes <div class="text-10px">(Total genes with at<br /> least one report)</div></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-sm-6">
              <div class="panel panel-default border-primary">
                <div class="panel-body border-bottom-1 p-2">
                  <a href="#dosage-sensitivity" class="pr-2 text-dark ">
                    <div class="">
                      <img src="https://www.clinicalgenome.org/site/assets/files/1143/untitled-1_icon-variant-interface_color.600x600.png" width="50px" />
                    </div>
                    <strong>Variant Pathogenicity</strong>
                    {{-- <i class="fas fa-arrow-circle-down"></i> --}}
                  </a>
                </div>
                <div class="panel-body row px-2 py-0">
                  <div class="col-xs-6 lineheight-tight py-3 px-2">
                    <div class="text-size-md lineheight-tight">{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_CURATIONS] ?? '' }}</div>
                    <div class="small lineheight-tight">Total reports <div class="text-10px">(Number of curations<br /> for this activity)</div></div>
                  </div>
                  <div class="col-xs-6 lineheight-tight py-3 px-2 border-left-1">
                    <div class="text-size-md">{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_UNIQUE] ?? '' }}</div>
                    <div class="small lineheight-tight">Unique variants <div class="text-10px">(Total variants with at<br /> least one curation)</div></div>
                  </div>
                </div>
              </div>
            </div>
        </div>


      <div id="gene-disease-validity-wrapper" class="">
        <hr class="mt-4 pb-4" />
        <h2 id="gene-disease-validity"><img src="https://www.clinicalgenome.org/site/assets/files/1142/untitled-1_icon-gene-interface_color.600x600.png" width="50px"  style="margin-top:-10px; margin-left:-50px"  /> Gene-Disease Clinical Validity Statistics</h2>
        <p>The ClinGen Gene-Disease Clinical Validity curation process involves evaluating the strength of evidence supporting or refuting a claim that variation in a particular gene causes a particular disease. </p>
        {{-- <h4>{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_CURATIONS] ?? '' }} Total Gene-Disease Validity Curations</h4> --}}
        <div class="row mt-4 mb-4">
          <div class="col-sm-7">
            <h4 class="mb-0">Classification Statistics</h4>
            <div class="mb-3">Gene-Disease Clinical Validity has <strong>{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_CURATIONS] ?? '' }} curations</strong> about <strong>{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GENES] ?? '' }} genes</strong>.</div>
            <table class="table table-condensed">
              <tr class="">
                <td class="col-sm-3 border-0">Definitive</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0">
                    <div class="progress-bar progress-bar-left-radius-0 chart-bg-definitive" role="progressbar" aria-valuenow="{{ $metrics->validity_percent_definitive }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $metrics->validity_percent_definitive *1.5 }}%;">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_DEFINITIVE] ?? '' }}</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td class=" border-0">Strong</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0">
                    <div class="progress-bar progress-bar-left-radius-0  chart-bg-strong"role="progressbar" aria-valuenow="{{ $metrics->validity_percent_strong }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $metrics->validity_percent_strong *1.5 }}%;">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_STRONG] ?? '' }}</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="col-sm-4 border-0">Moderate</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0">
                    <div class="progress-bar progress-bar-left-radius-0 chart-bg-moderate" role="progressbar" aria-valuenow="{{ $metrics->validity_percent_moderate }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $metrics->validity_percent_moderate *1.5 }}%;">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_MODERATE] ?? '' }}</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="col-sm-4 border-0">Limited</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0">
                    <div class="progress-bar progress-bar-left-radius-0  chart-bg-limited" role="progressbar" aria-valuenow="{{ $metrics->validity_percent_limited }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $metrics->validity_percent_limited *1.5 }}%; ">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_LIMITED] ?? '' }}</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="col-sm-4 border-0">Disputed Evidence</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0">
                    <div class="progress-bar progress-bar-left-radius-0 chart-bg-disputed-evidence" role="progressbar" aria-valuenow="{{ $metrics->validity_percent_disputed }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $metrics->validity_percent_disputed *1.5 }}%; ">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_DISPUTED] ?? '' }}</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="col-sm-4 border-0">Refuted Evidence</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0">
                    <div class="progress-bar progress-bar-left-radius-0 chart-bg-refuted-evidence" role="progressbar" aria-valuenow="{{ $metrics->validity_percent_refuted }}" aria-valuemin="0" aria-valuemax="100" style="width: 1%;">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_REFUTED] ?? '' }}</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="col-sm-4 border-0">Animal Model Only</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0">
                    <div class="progress-bar progress-bar-left-radius-0 chart-bg-animal-model-only " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;>
                    </div>
                    <span class="ml-2">0</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="col-sm-4 border-0 lineheight-tight">No Known Disease relationship</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mt-2 mb-1">
                    <div class="progress-bar progress-bar-left-radius-0 chart-bg-no-known-disease-relationship" role="progressbar" aria-valuenow="{{ $metrics->validity_percent_none }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $metrics->validity_percent_none *1.5 }}%;" >
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_NONE] ?? '' }}</span>
                  </div>
                </td>
              </tr>
            </table>
          </div>
          <div class="col-sm-4 text-center">
            {{-- <div class="row">
              <div class="col-sm-6 ttwrap"> --}}
                      {{-- <div class="text-size-lg lineheight-tight">
                        <span style="border: 6px #13a89e solid; border-radius:100rem; margin-bottom:.25rem; padding:1.0rem .5rem .5rem .5rem; min-width:6.5rem; min-height:6.5rem; display:inline-block; color:#0e665c">{{ $panel['count'] }}</span>
                      </div> --}}

                      <svg width="110%" height="110%" viewBox="0 0 42 42" class="donut">

                        <circle class="donut-hole" cx="21" cy="21" r="13.91549430918954" fill="none"/>
                        <circle class="donut-ring" cx="21" cy="21" r="15.91549430918954" fill="none" stroke="#000" stroke-width="3"/>

                        <circle class="donut-segment chart-stroke-definitive" cx="21" cy="21" r="15.91549430918954" data-container="body"  fill="none"  stroke-width="3" stroke-dasharray="{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classlength']['definitive evidence'] }} {{ 100.00 - $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classlength']['definitive evidence'] }}" stroke-dashoffset="{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classoffsets']['definitive evidence'] }}" onmousemove="showSvgTooltip(evt, '{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classtotals']['definitive evidence'] }} Definitive');" onmouseout="hideSvgTooltip();"/>

                        <circle class="donut-segment chart-stroke-strong" cx="21" cy="21" r="15.91549430918954" fill="none" stroke-width="3" stroke-dasharray="{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classlength']['strong evidence'] }} {{ 100.00 - $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classlength']['strong evidence'] }}" stroke-dashoffset="{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classoffsets']['strong evidence'] }}" onmousemove="showSvgTooltip(evt, '{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classtotals']['strong evidence'] }} Strong');" onmouseout="hideSvgTooltip();"/>

                        <circle class="donut-segment chart-stroke-moderate" cx="21" cy="21" r="15.91549430918954" fill="none" stroke-width="3" stroke-dasharray="{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classlength']['moderate evidence'] }} {{ 100.00 - $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classlength']['moderate evidence'] }}" stroke-dashoffset="{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classoffsets']['moderate evidence'] }}" onmousemove="showSvgTooltip(evt, '{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classtotals']['moderate evidence'] }} Moderate');" onmouseout="hideSvgTooltip();"/>

                        <circle class="donut-segment chart-stroke-limited " cx="21" cy="21" r="15.91549430918954" fill="none" stroke-width="3" stroke-dasharray="{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classlength']['limited evidence'] }} {{ 100.00 - $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classlength']['limited evidence'] }}" stroke-dashoffset="{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classoffsets']['limited evidence'] }}" onmousemove="showSvgTooltip(evt, '{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classtotals']['limited evidence'] }} Limited');" onmouseout="hideSvgTooltip();"/>

                        <circle class="donut-segment chart-stroke-disputed-evidence" cx="21" cy="21" r="15.91549430918954" fill="none" stroke-width="3" stroke-dasharray="{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classlength']['disputing'] }} {{ 100.00 - $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classlength']['disputing'] }}" stroke-dashoffset="{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classoffsets']['disputing'] }}" onmousemove="showSvgTooltip(evt, '{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classtotals']['disputing'] }} Disputed');" onmouseout="hideSvgTooltip();"/>

                        <circle class="donut-segment chart-stroke-refuted-evidence" cx="21" cy="21" r="15.91549430918954" fill="none" stroke-width="3" stroke-dasharray="{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classlength']['refuting evidence'] }} {{ 100.00 - $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classlength']['refuting evidence'] }}" stroke-dashoffset="{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classoffsets']['refuting evidence'] }}" onmousemove="showSvgTooltip(evt, '{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classtotals']['refuting evidence'] }} Refuted');" onmouseout="hideSvgTooltip();"/>

                        <circle class="donut-segment chart-stroke-no-known-disease-relationship" cx="21" cy="21" r="15.91549430918954" fill="none" stroke-width="3" stroke-dasharray="{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classlength']['no known disease relationship'] }} {{ 100.00 - $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classlength']['no known disease relationship'] }}" stroke-dashoffset="{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classoffsets']['no known disease relationship'] }}" onmousemove="showSvgTooltip(evt, '{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classtotals']['no known disease relationship'] }} No Known Disease Relationship');" onmouseout="hideSvgTooltip();"/>

                        <!-- unused 10% -->
                        <g class="chart-text chart-small">
                          <text x="50%" y="45%" class="chart-number">
                            {{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_CURATIONS] ?? '' }}
                          </text>
                          <text x="50%" y="45%" class="chart-label">
                            Total
                          </text>
                          <text x="50%" y="52%" class="chart-label">
                            Gene-Disease
                          </text>
                          <text x="50%" y="59%" class="chart-label">
                            Curations
                          </text>
                        </g>
                      </svg>

             {{-- </div> --}}
              {{-- <div class="col-sm-6">
                <div style="height:300px; width:300px; margin-left:auto; margin-right:auto; background-image:url('/images/sample-chart-solid.png'); background-size: cover;">
                  <div class="text-size-lg lineheight-tight" style="padding-top: 90px">{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GENES] ?? '' }}</div>
                  <div class="">Total Unique <br>Genes Curated</div>
                </div>
              </div> --}}
            {{-- </div> --}}

        </div>

        <div class="row  mt-4">
          <h4 class="col-sm-12">{{ count($metrics->values[App\Metric::KEY_EXPERT_PANELS]) }} ClinGen Gene Curation Expert Panels</h4>

          @php
            $i=1;
          @endphp

          @foreach (collect($metrics->values[App\Metric::KEY_EXPERT_PANELS])->sortBy('label')->toArray() as $key => $panel)

          {{-- @if(++$i <= 9) --}}
          @php
            $i++;
          @endphp
            <div class="col-sm-3 text-center">
              <div class="panel panel-default border-0">
                  <div class="panel-body">
                    <a href="https://www.clinicalgenome.org/affiliation/{{ $panel['ep_id'] }}" class="text-dark svg-link">

                      {{-- <div class="text-size-lg lineheight-tight">
                        <span style="border: 6px #13a89e solid; border-radius:100rem; margin-bottom:.25rem; padding:1.0rem .5rem .5rem .5rem; min-width:6.5rem; min-height:6.5rem; display:inline-block; color:#0e665c">{{ $panel['count'] }}</span>
                      </div> --}}

                      <svg width="50%" height="50%" viewBox="0 0 42 42" class="donut">

                        <circle class="donut-hole" cx="21" cy="21" r="13.91549430918954" fill="none"/>
                        <circle class="donut-ring" cx="21" cy="21" r="15.91549430918954" fill="none" stroke="#000" stroke-width="3"/>

                        <circle class="donut-segment chart-stroke-definitive" cx="21" cy="21" r="15.91549430918954"  fill="none"  stroke-width="3" stroke-dasharray="{{ $panel['classlength']['definitive evidence'] }} {{ 100.00 - $panel['classlength']['definitive evidence'] }}" stroke-dashoffset="{{ $panel['classoffsets']['definitive evidence'] }}" onmousemove="showSvgTooltip(evt, '{{ $panel['classtotals']['definitive evidence'] }} Definitive');" onmouseout="hideSvgTooltip();"/>

                        <circle class="donut-segment chart-stroke-strong" cx="21" cy="21" r="15.91549430918954" fill="none" stroke-width="3" stroke-dasharray="{{ $panel['classlength']['strong evidence'] }} {{ 100.00 - $panel['classlength']['strong evidence'] }}" stroke-dashoffset="{{ $panel['classoffsets']['strong evidence'] }}" onmousemove="showSvgTooltip(evt, '{{ $panel['classtotals']['strong evidence'] }} Strong');" onmouseout="hideSvgTooltip();"/>

                        <circle class="donut-segment chart-stroke-moderate" cx="21" cy="21" r="15.91549430918954" fill="none" stroke-width="3" stroke-dasharray="{{ $panel['classlength']['moderate evidence'] }} {{ 100.00 - $panel['classlength']['moderate evidence'] }}" stroke-dashoffset="{{ $panel['classoffsets']['moderate evidence'] }}" onmousemove="showSvgTooltip(evt, '{{ $panel['classtotals']['moderate evidence'] }} Moderate');" onmouseout="hideSvgTooltip();"/>

                        <circle class="donut-segment chart-stroke-limited " cx="21" cy="21" r="15.91549430918954" fill="none" stroke-width="3" stroke-dasharray="{{ $panel['classlength']['limited evidence'] }} {{ 100.00 - $panel['classlength']['limited evidence'] }}" stroke-dashoffset="{{ $panel['classoffsets']['limited evidence'] }}" onmousemove="showSvgTooltip(evt, '{{ $panel['classtotals']['limited evidence'] }} Limited');" onmouseout="hideSvgTooltip();"/>

                        <circle class="donut-segment chart-stroke-disputed-evidence" cx="21" cy="21" r="15.91549430918954" fill="none" stroke-width="3" stroke-dasharray="{{ $panel['classlength']['disputing'] }} {{ 100.00 - $panel['classlength']['disputing'] }}" stroke-dashoffset="{{ $panel['classoffsets']['disputing'] }}" onmousemove="showSvgTooltip(evt, '{{ $panel['classtotals']['disputing'] }} Disputed');" onmouseout="hideSvgTooltip();"/>

                        <circle class="donut-segment chart-stroke-refuted-evidence" cx="21" cy="21" r="15.91549430918954" fill="none" stroke-width="3" stroke-dasharray="{{ $panel['classlength']['refuting evidence'] }} {{ 100.00 - $panel['classlength']['refuting evidence'] }}" stroke-dashoffset="{{ $panel['classoffsets']['refuting evidence'] }}" onmousemove="showSvgTooltip(evt, '{{ $panel['classtotals']['refuting evidence'] }} Refuted');" onmouseout="hideSvgTooltip();"/>

                        <circle class="donut-segment chart-stroke-no-known-disease-relationship" cx="21" cy="21" r="15.91549430918954" fill="none"  stroke-width="3" stroke-dasharray="{{ $panel['classlength']['no known disease relationship'] }} {{ 100.00 - $panel['classlength']['no known disease relationship'] }}" stroke-dashoffset="{{ $panel['classoffsets']['no known disease relationship'] }}" onmousemove="showSvgTooltip(evt, '{{ $panel['classtotals']['no known disease relationship'] }} No Known Disease Relationship');" onmouseout="hideSvgTooltip();"/>


                        {{-- <circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" transform="rotate(-90 21 21)" data-text="Definitive" data-value="{{ $panel['classtotals']['definitive evidence'] }}" fill="transparent" stroke="#276749" stroke-width="3" stroke-dasharray="{{ $panel['classlength']['definitive evidence'] }} {{ 100.00 - $panel['classlength']['definitive evidence'] }}" stroke-dashoffset="{{ $panel['classoffsets']['definitive evidence'] }}"/>

                        <circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" transform="rotate(-90 21 21)" data-text="Strong" data-value="{{ $panel['classtotals']['strong evidence'] }}" fill="transparent" stroke="#38a169" stroke-width="3" stroke-dasharray="{{ $panel['classlength']['strong evidence'] }} {{ 100.00 - $panel['classlength']['strong evidence'] }}" stroke-dashoffset="{{ $panel['classoffsets']['strong evidence'] }}"/>
                        <circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" transform="rotate(-90 21 21)" data-text="Moderate" data-value="{{ $panel['classtotals']['moderate evidence'] }}" fill="transparent" stroke="#68d391" stroke-width="3" stroke-dasharray="{{ $panel['classlength']['moderate evidence'] }} {{ 100.00 - $panel['classlength']['moderate evidence'] }}" stroke-dashoffset="{{ $panel['classoffsets']['moderate evidence'] }}"/>
                        <circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" transform="rotate(-90 21 21)" data-text="Limited" data-value="{{ $panel['classtotals']['limited evidence'] }}" fill="transparent" stroke="#fc8181" stroke-width="3" stroke-dasharray="{{ $panel['classlength']['limited evidence'] }} {{ 100.00 - $panel['classlength']['limited evidence'] }}" stroke-dashoffset="{{ $panel['classoffsets']['limited evidence'] }}"/>
                        <circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" transform="rotate(-90 21 21)" data-text="Disputed Evidence" data-value="{{ $panel['classtotals']['disputing'] }}" fill="transparent" stroke="#e53e3e" stroke-width="3" stroke-dasharray="{{ $panel['classlength']['disputing'] }} {{ 100.00 - $panel['classlength']['disputing'] }}" stroke-dashoffset="{{ $panel['classoffsets']['disputing'] }}"/>
                        <circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" transform="rotate(-90 21 21)" data-text="Refuted Evidence" data-value="{{ $panel['classtotals']['refuting evidence'] }}" fill="transparent" stroke="#9b2c2c" stroke-width="3" stroke-dasharray="{{ $panel['classlength']['refuting evidence'] }} {{ 100.00 - $panel['classlength']['refuting evidence'] }}" stroke-dashoffset="{{ $panel['classoffsets']['refuting evidence'] }}"/>
                        <circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" transform="rotate(-90 21 21)" data-text="No Known Disease Relationship" data-value="{{ $panel['classtotals']['no known disease relationship'] }}" fill="transparent" stroke="#718096" stroke-width="3" stroke-dasharray="{{ $panel['classlength']['no known disease relationship'] }} {{ 100.00 - $panel['classlength']['no known disease relationship'] }}" stroke-dashoffset="{{ $panel['classoffsets']['no known disease relationship'] }}"/> --}}
                        <!-- unused 10% -->
                        <g class="chart-text">
                          <text x="50%" y="50%" class="chart-number">
                            {{ $panel['count'] }}
                          </text>
                          <text x="50%" y="50%" class="chart-label">
                            Curations
                          </text>
                        </g>
                      </svg>

                      <div class="mb-2 lineheight-tight">{{ $panel['label'] }}</div>

                    </a>
                  </div>
                </div>
             </div>

          @if ($i % 4 == 1)
            <br clear="all" />
          @endif
          {{-- @endif --}}
          @if ($i == 9)
            <div class="text-center mb-4" id="collapseMoreGcepsButtonWrapper">
              <a class="btn btn-default btn-lg btn-primary" id="collapseMoreGcepsButton" role="button" data-toggle="collapse" href="#collapseMoreGceps" aria-expanded="false" aria-controls="collapseExample">Load more Gene Curation Expert Panels</a>
            </div>
            {{-- Start the GCEP collape --}}
            <div  class="collapse" id="collapseMoreGceps">
          @endif
          @endforeach

            {{-- The next DIV is the END of the GCEP Collapse --}}
            </div>
        </div>
      </div>




        <hr class="mt-4 pb-4" />
        <h2 id="dosage-sensitivity">
                      <img src="https://www.clinicalgenome.org/site/assets/files/1145/untitled-1_icon-dosage-interface_color.600x600.png" width="50px"  style="margin-top:-10px; margin-left:-50px"  />  Dosage Sensitivity Statistics</h2>
        <p>The ClinGen Dosage Sensitivity curation process collects evidence supporting/refuting the haploinsufficiency and triplosensitivity of genes and genomic regions.</p>
        <h4>{{ $metrics->values[App\Metric::KEY_TOTAL_DOSAGE_CURATIONS] ?? '' }} Total Dosage Sensitivity Curations</h4>
        <div class="row text-center mt-4">
          <div class="col-sm-4">
            <div class="panel panel-default border-primary">
                <div class="panel-body p-2">
                  <div class="text-size-lg lineheight-tight">{{ $metrics->values[App\Metric::KEY_TOTAL_DOSAGE_CURATIONS] ?? '' }}</div>
                  <div class="mb-2 lineheight-tight">Total <br />Dosage Sensitivity Curations</div>
                </div>
              </div>
          </div>
          <div class="col-sm-4">
            <div class="panel panel-default border-primary">
                <div class="panel-body p-2">
                  <div class="text-size-lg lineheight-tight">{{ $metrics->values[App\Metric::KEY_TOTAL_DOSAGE_GENES] ?? '' }}</div>
                  <div class="mb-2 lineheight-tight">Total Single Gene <br />Dosage Sensitivity Curations</div>
                </div>
              </div>
          </div>
          <div class="col-sm-4">
            <div class="panel panel-default border-primary">
                <div class="panel-body p-2">
                  <div class="text-size-lg lineheight-tight">{{ $metrics->values[App\Metric::KEY_TOTAL_DOSAGE_REGIONS] ?? '' }}</div>
                  <div class="mb-2 lineheight-tight">Total Region <br />Dosage Sensitivity Curations</div>
                </div>
              </div>
          </div>
          <!--
          <div class="col-sm-4">
            <div class="panel panel-default border-primary">
                <div class="panel-body p-2">
                  <div class="text-size-lg lineheight-tight">XXXX</div>
                  <div class="mb-2 lineheight-tight">Something Else <br />Dosage Sensitivity Curation</div>
                </div>
              </div>
          </div> -->
        </div>
        <div class="row mt-2">
          <div class="col-sm-6">
            <h5>Haploinsufficiency Classifications Visualized</h4>
            <table class="table table-condensed">
              <tr>
                <td class="col-sm-4 border-0">Sufficient Evidence</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0">
                    <div class="progress-bar progress-bar-left-radius-0 " role="progressbar" aria-valuenow="{{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_HAP_SUFFICIENT) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_HAP_SUFFICIENT) }}%; background-color:#990000; opacity:1">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_DOSAGE_HAP_SUFFICIENT] ?? '' }}</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="col-sm-4 border-0">Emerging Evidence</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0">
                    <div class="progress-bar progress-bar-left-radius-0 " role="progressbar" aria-valuenow="{{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_HAP_EMERGING) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_HAP_EMERGING) }}%; background-color:#990000; opacity:.8">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_DOSAGE_HAP_EMERGING] ?? '' }}</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="col-sm-4 border-0">Little Evidence</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0">
                    <div class="progress-bar progress-bar-left-radius-0 " role="progressbar" aria-valuenow="{{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_HAP_LITTLE) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_HAP_LITTLE) }}%; background-color:#990000; opacity:.6">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_DOSAGE_HAP_LITTLE] ?? '' }}</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="col-sm-4 border-0">No Evidence</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0">
                    <div class="progress-bar progress-bar-left-radius-0 " role="progressbar" aria-valuenow="{{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_HAP_NONE) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_HAP_NONE) }}%; background-color:#990000; opacity:.5">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_DOSAGE_HAP_NONE] ?? '' }}</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td class=" border-0">Autosomal Recessive</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0">
                    <div class="progress-bar progress-bar-left-radius-0 " role="progressbar" aria-valuenow="{{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_HAP_AR) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_HAP_AR) }}%; background-color:#990000; opacity:0.4">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_DOSAGE_HAP_AR] ?? '' }}</span>
                  </div>
                </td>
              </tr>
              <tr class="">
                <td class="col-sm-3 border-0">Dosage Sensitivity Unlikely</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-1 mt-2">
                    <div class="progress-bar progress-bar-left-radius-0 " role="progressbar" aria-valuenow="{{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_HAP_UNLIKELY) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_HAP_UNLIKELY) }}%; background-color:#990000; opacity:.3">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_DOSAGE_HAP_UNLIKELY] ?? '' }}</span>
                  </div>
                </td>
              </tr>
            </table>
          </div>
          <div class="col-sm-6 border-left-1">
            <h5>Triplosensitivity  Classifications Visualized</h4>
            <table class="table table-condensed">
              <tr>
                <td class="col-sm-4 border-0">Sufficient Evidence</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="{{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_TRIP_SUFFICIENT) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_TRIP_SUFFICIENT) }}%; background-color:#003366; opacity:1">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_DOSAGE_TRIP_SUFFICIENT] ?? '' }}</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="col-sm-4 border-0">Emerging Evidence</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="{{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_TRIP_EMERGING) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_TRIP_EMERGING) }}%; background-color:#003366; opacity:.8">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_DOSAGE_TRIP_EMERGING] ?? '' }}</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="col-sm-4 border-0">Little Evidence</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="{{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_TRIP_LITTLE) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_TRIP_LITTLE) }}%; background-color:#003366; opacity:.6">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_DOSAGE_TRIP_LITTLE] ?? '' }}</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="col-sm-4 border-0">No Evidence</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="{{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_TRIP_NONE) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_TRIP_NONE) }}%; background-color:#66ccff; opacity:.5">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_DOSAGE_TRIP_NONE] ?? '' }}</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td class=" border-0">Autosomal Recessive</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="{{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_TRIP_AR) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_TRIP_AR) }}%; background-color:#003366; opacity:.4">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_DOSAGE_TRIP_AR] ?? '' }}</span>
                  </div>
                </td>
              </tr>
              <tr class="">
                <td class="col-sm-3 border-0">Dosage Sensitivity Unlikely</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-1 mt-2">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="{{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_TRIP_UNLIKELY) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $metrics->graphDosagePercentage(App\Metric::KEY_TOTAL_DOSAGE_TRIP_UNLIKELY) }}%; background-color:#003366; opacity:.3">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_DOSAGE_TRIP_UNLIKELY] ?? '' }}</span>
                  </div>
                </td>
              </tr>
            </table>
          </div>
        </div>



        <hr class="mt-4 pb-4" />
        <h2 id="clinical-actionability">
                      <img src="https://www.clinicalgenome.org/site/assets/files/1144/untitled-1_icon-actionability-interface_color.600x600.png" width="50px"  style="margin-top:-10px; margin-left:-50px"  />  Clinical Actionability</h2>
        <p>The overarching goal of the Clinical Actionability curation process is to identify those human genes that, when significantly altered, confer a high risk of serious disease that could be prevented or mitigated </p>
<div class="row text-center mt-4">
    <div class="col-md-7">

          {{-- <div class="col-sm-12 text-left"><h4>{{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_REPORTS] ?? '' }} Total Clinical Actionability Reports</h4></div> --}}
          <div class="col-sm-12 text-left"><h4>Clinical Actionability Reports Summarized</h4></div>

          {{-- <div class="col-sm-4 px-1">
            <div class="panel panel-default border-primary">
                <div class="panel-body p-1">
                  <div class="text-size-lg lineheight-tight">
                    {{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_REPORTS] ?? '' }}
                  </div>
                  <div class="mb-2 lineheight-tight">Total Actionability <br />Reports</div>
                </div>
              </div>
          </div> --}}
          <div class="col-sm-6 px-1">
            <div class="panel panel-default border-primary">
                <div class="panel-body p-1">
                  <div class="text-size-lg lineheight-tight">
                    {{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_UPDATED_REPORTS] ?? '' }}
                  </div>
                  <div class="mb-2 lineheight-tight">Total Actionability <br />Updated Reports</div>
                </div>
              </div>
          </div>
          <div class="col-sm-6 px-1">
            <div class="panel panel-default border-primary">
                <div class="panel-body p-1">
                  <div class="text-size-lg lineheight-tight">
                    {{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_GENES] ?? '' }}
                  </div>
                  <div class="mb-2 lineheight-tight">Total Genes Included in <br>Actionability Reports</div>
                </div>
              </div>
          </div>
          <div class="col-sm-6 px-1">
            <div class="panel panel-default border-primary">
                <div class="panel-body p-1">
                  <div class="text-size-lg lineheight-tight">
                    {{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_GD_PAIRS] }}
                  </div>
                  <div class="mb-2 lineheight-tight">Total Gene-Disease<br> Pairs</div>
                </div>
              </div>
          </div>
          <div class="col-sm-6 px-1">
            <div class="panel panel-default border-primary">
                <div class="panel-body p-1">
                  <div class="text-size-lg lineheight-tight">
                    {{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_OUTCOME] ?? '' }}
                  </div>
                  <div class="mb-2 lineheight-tight">Total Outcome-Intervention<br> Pairs</div>
                </div>
              </div>
          </div>

          {{-- <div class="col-sm-4 px-1">
            <div class="panel panel-default border-primary">
                <div class="panel-body p-1">
                  <div class="text-size-lg lineheight-tight">
                    2
                  </div>
                  <div class="mb-2 lineheight-tight">Curation <br /> Working Groups</div>
                </div>
              </div>
          </div> --}}
        </div>

          <div class="col-md-4">
            <svg width="110%" height="110%" viewBox="0 0 42 42" class="donut">

                        <circle class="donut-hole" cx="21" cy="21" r="13.91549430918954" fill="none"/>
                        <circle class="donut-ring" cx="21" cy="21" r="15.91549430918954" fill="none" stroke="#000" stroke-width="3"/>

                        <circle class="donut-segment chart-stroke-actionability-peds" cx="21" cy="21" r="15.91549430918954" data-container="body"  fill="none"  stroke-width="3" stroke-dasharray="{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classlength']['definitive evidence'] }} {{ 100.00 - $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classlength']['definitive evidence'] }}" stroke-dashoffset="{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classoffsets']['definitive evidence'] }}" onmousemove="showSvgTooltip(evt, '{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classtotals']['definitive evidence'] }} Pediatric Context');" onmouseout="hideSvgTooltip();"/>

                        <circle class="donut-segment chart-stroke-actionability-adult" cx="21" cy="21" r="15.91549430918954" fill="none" stroke-width="3" stroke-dasharray="{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classlength']['strong evidence'] }} {{ 100.00 - $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classlength']['strong evidence'] }}" stroke-dashoffset="{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classoffsets']['strong evidence'] }}" onmousemove="showSvgTooltip(evt, '{{ $metrics->values[App\Metric::KEY_TOTAL_VALIDITY_GRAPH]['classtotals']['strong evidence'] }} Adult Context');" onmouseout="hideSvgTooltip();"/>

                        <!-- unused 10% -->
                        <g class="chart-text chart-small">
                          <text x="50%" y="45%" class="chart-number">
                            {{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_REPORTS] ?? '' }}
                          </text>
                          <text x="50%" y="45%" class="chart-label">
                            Total Clinical
                          </text>
                          <text x="50%" y="52%" class="chart-label">
                            Actionability
                          </text>
                          <text x="50%" y="59%" class="chart-label">
                            Reports
                          </text>
                        </g>
                      </svg>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-sm-6">
            <h5 class="mb-0">Adult Context </h4>

              <p>{{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_ADULT_OUTCOME] ?? '' }} Total Adult Outcome-Intervention Pairs</p>

              <p><strong>Total Scores Visualized</strong></p>

            <table class="table table-condensed">
              <tr class="">
                <td class="col-sm-2 text-right border-0"><strong>12 Score</strong></td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0 mt-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 60%; background-color:#a2cb50; opacity:1">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_ADULT_SCORE][12] ?? 0 }}</span>
                  </div>
                </td>
              </tr>

              <tr class="">
                <td class="col-sm-2 text-right border-0"><strong>11 Score</strong></td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0 mt-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 70%; background-color:#65ba59; opacity:1">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_ADULT_SCORE][11] ?? 0 }}</span>
                  </div>
                </td>
              </tr>

              <tr class="">
                <td class="col-sm-2 text-right border-0"><strong>10 Score</strong></td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0 mt-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 80%; background-color:#469c50; opacity:1">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_ADULT_SCORE][10] ?? 0 }}</span>
                  </div>
                </td>
              </tr>

              <tr class="">
                <td class="col-sm-2 text-right border-0"><strong>9 Score</strong></td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0 mt-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 90%; background-color:#4fb0a8; opacity:1">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_ADULT_SCORE][9] ?? 0 }}</span>
                  </div>
                </td>
              </tr>

              <tr class="">
                <td class="col-sm-2 text-right border-0"><strong>8 Score</strong></td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0 mt-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 70%; background-color:#55b2e3; opacity:1">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_ADULT_SCORE][8] ?? 0 }}</span>
                  </div>
                </td>
              </tr>

              <tr class="">
                <td class="col-sm-2 text-right border-0"><strong>7 Score</strong></td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0 mt-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 70%; background-color:#367fc2; opacity:1">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_ADULT_SCORE][7] ?? 0 }}</span>
                  </div>
                </td>
              </tr>
              <tr class="">
                <td class="col-sm-2 text-right border-0"><strong>6 Score</strong></td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0 mt-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 60%; background-color:#69399a; opacity:1">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_ADULT_SCORE][6] ?? 0 }}</span>
                  </div>
                </td>
              </tr>
              <tr class="">
                <td class="col-sm-2 text-right border-0"><strong>5 Score</strong></td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0 mt-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 50%; background-color:#913699; opacity:1">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_ADULT_SCORE][5] ?? 0 }}</span>
                  </div>  <small>5 or less</small>
                </td>
              </tr>
              <tr class="">
                <td class="col-sm-2 text-right border-0"><strong>Rule-out</strong></td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0 mt-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 50%; background-color:#666; opacity:1">
                    </div>
                    <span class="ml-2">XX</span>

                  </div><small>Failed Early Rule-out</small>
                </td>
              </tr>
            </table>
          </div>
          <div class="col-sm-6 border-left-1">
            <h5 class="mb-0">Pediatric Context </h4>

              <p>{{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_PED_OUTCOME] ?? '' }} Total Pediatric Outcome-Intervention Pairs</p>

              <p><strong>Total Scores Visualized</strong></p>
            <table class="table table-condensed">
              <tr class="">
                <td class="col-sm-2 text-right border-0"><strong>12 Score</strong></td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0 mt-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 60%; background-color:#a2cb50; opacity:1">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_PED_SCORE][12] ?? 0 }}</span>
                  </div>
                </td>
              </tr>

              <tr class="">
                <td class="col-sm-2 text-right border-0"><strong>11 Score</strong></td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0 mt-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 70%; background-color:#65ba59; opacity:1">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_PED_SCORE][11] ?? 0 }}</span>
                  </div>
                </td>
              </tr>

              <tr class="">
                <td class="col-sm-2 text-right border-0"><strong>10 Score</strong></td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0 mt-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 80%; background-color:#469c50; opacity:1">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_PED_SCORE][10] ?? 0 }}</span>
                  </div>
                </td>
              </tr>

              <tr class="">
                <td class="col-sm-2 text-right border-0"><strong>9 Score</strong></td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0 mt-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 90%; background-color:#4fb0a8; opacity:1">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_PED_SCORE][9] ?? 0 }}</span>
                  </div>
                </td>
              </tr>

              <tr class="">
                <td class="col-sm-2 text-right border-0"><strong>8 Score</strong></td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0 mt-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 70%; background-color:#55b2e3; opacity:1">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_PED_SCORE][8] ?? 0 }}</span>
                  </div>
                </td>
              </tr>

              <tr class="">
                <td class="col-sm-2 text-right border-0"><strong>7 Score</strong></td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0 mt-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 70%; background-color:#367fc2; opacity:1">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_PED_SCORE][7] ?? 0 }}</span>
                  </div>
                </td>
              </tr>
              <tr class="">
                <td class="col-sm-2 text-right border-0"><strong>6 Score</strong></td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0 mt-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 60%; background-color:#69399a; opacity:1">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_PED_SCORE][6] ?? 0 }}</span>
                  </div>
                </td>
              </tr>
              <tr class="">
                <td class="col-sm-2 text-right border-0"><strong>5 Score</strong></td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0 mt-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 50%; background-color:#913699; opacity:1">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_ACTIONABILITY_PED_SCORE][5] ?? 0 }}</span>
                  </div>  <small>5 or less</small>
                </td>
              </tr>
              <tr class="">
                <td class="col-sm-2 text-right border-0"><strong>Rule-out</strong></td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0 mt-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 50%; background-color:#666; opacity:1">
                    </div>
                    <span class="ml-2">XX</span>

                  </div><small>Failed Early Rule-out</small>
                </td>
              </tr>
            </table>
          </div>
        </div>


        <div id="gene-disease-validity-wrapper" class="">
        <hr class="mt-4 pb-4">
        <h2 id="gene-disease-validity">
                      <img src="https://www.clinicalgenome.org/site/assets/files/1143/untitled-1_icon-variant-interface_color.600x600.png" width="50px" style="margin-top:-10px; margin-left:-50px"  /> Variant Pathogenicity Statistics</h2>
        <p>ClinGen variant curation utilizes the 2015 American College of Medical Genetics and Genomics (ACMG) guideline for sequence variant interpretation, which provides an evidence-based framework to classify variants.</p>

        <div class="row mt-4 mb-4">
          <div class="col-sm-7">
            <h4 class="mb-0">Classification Statistics</h4>
            <div class="mb-3">Variant Pathogenicity has <strong>{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_CURATIONS] ?? '' }} curations</strong>.</div>            <table class="table table-condensed">
              <tbody><tr class="">
                <td class="col-sm-3 border-0">Pathogenic</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0">
                    <div class="progress-bar progress-bar-left-radius-0 progress-bar-danger chart-bg-pathogenic" role="progressbar" aria-valuenow="{{ $metrics->pathogenicity_percent_pathogenic }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $metrics->pathogenicity_percent_pathogenic * 1.5 }}%;">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_PATHOGENIC] ?? '' }}</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td class=" border-0">Likely Pathogenic</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0">
                    <div class="progress-bar progress-bar-left-radius-0 progress-bar-warning chart-bg-likely-pathogenic"  role="progressbar" aria-valuenow="1" aria-valuemin="{{ $metrics->pathogenicity_percent_likely }}" aria-valuemax="100" style="width: {{ $metrics->pathogenicity_percent_likely * 1.5 }}%;">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_LIKELY] ?? '' }}</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="col-sm-4 border-0">Uncertain Significance</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0">
                    <div class="progress-bar progress-bar-left-radius-0 progress-bar-info chart-bg-uncertain-significance" role="progressbar" aria-valuenow="{{ $metrics->pathogenicity_percent_uncertain }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $metrics->pathogenicity_percent_uncertain * 1.5 }}%;">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_UNCERTAIN] ?? '' }}</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="col-sm-4 border-0">Likely Benign</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0 chart-bg-likely-benign" role="progressbar" aria-valuenow="{{ $metrics->pathogenicity_percent_likely_benign }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $metrics->pathogenicity_percent_likely_benign * 1.5 }}%;background-color: mediumseagreen;">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_LIKELYBENIGN] ?? '' }}</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="col-sm-4 border-0">Benign</td>
                <td class="border-0">
                  <div class="progress progress-no-bg mb-0">
                    <div class="progress-bar progress-bar-success progress-bar-left-radius-0 chart-bg-benign" role="progressbar" aria-valuenow="{{ $metrics->pathogenicity_percent_benign }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $metrics->pathogenicity_percent_benign * 1.5 }}%;">
                    </div>
                    <span class="ml-2">{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_BENIGN] ?? '' }}</span>
                  </div>
                </td>
              </tr>

            </tbody></table>
          </div>
          {{-- <div class="col-sm-7 text-center">
            <div class="row"> --}}
              <div class="col-sm-4">
                  {{-- <div class="text-size-lg lineheight-tight">
                    <span style="border: 6px #13a89e solid; border-radius:100rem; margin-bottom:.25rem; padding:1.0rem .5rem .5rem .5rem; min-width:6.5rem; min-height:6.5rem; display:inline-block; color:#0e665c">{{ $panel['count'] }}</span>
                  </div> --}}

                  <svg width="110%" height="110%" viewBox="0 0 42 42" class="donut">
                    <circle class="donut-hole" cx="21" cy="21" r="15.91549430918954" fill="none"/>
                    <circle class="donut-ring" cx="21" cy="21" r="15.91549430918954" fill="none" stroke="#000" stroke-width="3"/>

                    <circle class="donut-segment chart-stroke-pathogenic" cx="21" cy="21" r="15.91549430918954" fill="none" stroke-width="3" stroke-dasharray="{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_GRAPH]['classlength']['Pathogenic'] }} {{ 100.00 - $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_GRAPH]['classlength']['Pathogenic'] }}" stroke-dashoffset="{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_GRAPH]['classoffsets']['Pathogenic'] }}"  onmousemove="showSvgTooltip(evt, '{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_GRAPH]['classtotals']['Pathogenic'] }} Pathogenic');" onmouseout="hideSvgTooltip();"/>

                      <circle class="donut-segment chart-stroke-likely-pathogenic" cx="21" cy="21" r="15.91549430918954" fill="none" stroke-width="3" stroke-dasharray="{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_GRAPH]['classlength']['Likely Pathogenic'] }} {{ 100.00 - $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_GRAPH]['classlength']['Likely Pathogenic'] }}" stroke-dashoffset="{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_GRAPH]['classoffsets']['Likely Pathogenic'] }}"  onmousemove="showSvgTooltip(evt, '{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_GRAPH]['classtotals']['Likely Pathogenic'] }} Likely Pathogenic');" onmouseout="hideSvgTooltip();"/>

                    <circle class="donut-segment chart-stroke-uncertain-significance" cx="21" cy="21" r="15.91549430918954"  fill="none" stroke-width="3" stroke-dasharray="{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_GRAPH]['classlength']['Uncertain Significance'] }} {{ 100.00 - $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_GRAPH]['classlength']['Uncertain Significance'] }}" stroke-dashoffset="{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_GRAPH]['classoffsets']['Uncertain Significance'] }}"  onmousemove="showSvgTooltip(evt, '{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_GRAPH]['classtotals']['Uncertain Significance'] }} Uncertain Significance');" onmouseout="hideSvgTooltip();"/>

                    <circle class="donut-segment chart-stroke-likely-benign " cx="21" cy="21" r="15.91549430918954"  fill="none"  stroke-width="3" stroke-dasharray="{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_GRAPH]['classlength']['Likely Benign'] }} {{ 100.00 - $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_GRAPH]['classlength']['Likely Benign'] }}" stroke-dashoffset="{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_GRAPH]['classoffsets']['Likely Benign'] }}"  onmousemove="showSvgTooltip(evt, '{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_GRAPH]['classtotals']['Likely Benign'] }} Likely Benign');" onmouseout="hideSvgTooltip();"/>

                      <circle class="donut-segment chart-stroke-benign" cx="21" cy="21" r="15.91549430918954" fill="none" stroke-width="3" stroke-dasharray="{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_GRAPH]['classlength']['Benign'] }} {{ 100.00 - $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_GRAPH]['classlength']['Benign'] }}" stroke-dashoffset="{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_GRAPH]['classoffsets']['Benign'] }}"  onmousemove="showSvgTooltip(evt, '{{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_GRAPH]['classtotals']['Benign'] }} Benign');" onmouseout="hideSvgTooltip();"/>
                    <!-- unused 10% -->
                    <g class="chart-text chart-small">
                      <text x="50%" y="45%" class="chart-number">
                        {{ $metrics->values[App\Metric::KEY_TOTAL_PATHOGENICITY_CURATIONS] ?? '' }}
                      </text>
                      <text x="50%" y="45%" class="chart-label">
                            Total Variant
                          </text>
                          <text x="50%" y="52%" class="chart-label">
                            Pathogenicity
                          </text>
                          <text x="50%" y="59%" class="chart-label">
                            Curations
                          </text>
                    </g>
                  </svg>

         {{-- </div>
            </div> --}}
        </div>

        <div class="row  mt-4">
          <h4 class="col-sm-12">{{ count($metrics->values[App\Metric::KEY_EXPERT_PANELS_PATHOGENICITY]) }} ClinGen Variant Curation Expert Panels</h4>


          @php
            $i=1;
          @endphp

          @foreach (collect($metrics->values[App\Metric::KEY_EXPERT_PANELS_PATHOGENICITY])->sortBy('label')->toArray() as $key => $panel)
          @php
            $i++;
          @endphp
          {{-- @if(++$i <= 1000) --}}
            <div class="col-sm-3 text-center">
              <div class="panel panel-default border-0">
                  <div class="panel-body">
                    <a href="https://www.clinicalgenome.org/affiliation/{{ $panel['ep_id'] }}" class="text-dark svg-link">
                      {{-- <div class="text-size-lg lineheight-tight">
                        <span style="border: 6px #13a89e solid; border-radius:100rem; margin-bottom:.25rem; padding:1.0rem .5rem .5rem .5rem; min-width:6.5rem; min-height:6.5rem; display:inline-block; color:#0e665c">{{ $panel['count'] }}</span>
                      </div> --}}

                      <svg width="50%" height="50%" viewBox="0 0 42 42" class="donut">

                      <circle class="donut-hole" cx="21" cy="21" r="15.91549430918954" fill="none"/>
                      <circle class="donut-ring" cx="21" cy="21" r="15.91549430918954" fill="none" stroke="#000" stroke-width="3"/>

                      <circle class="donut-segment chart-stroke-pathogenic" cx="21" cy="21" r="15.91549430918954" fill="none" stroke-width="3" stroke-dasharray="{{ $panel['classlength']['Pathogenic'] }} {{ 100.00 - $panel['classlength']['Pathogenic'] }}" stroke-dashoffset="{{ $panel['classoffsets']['Pathogenic'] }}"  onmousemove="showSvgTooltip(evt, '{{ $panel['classtotals']['Pathogenic'] }} Pathogenic');" onmouseout="hideSvgTooltip();"/>

                      <circle class="donut-segment chart-stroke-likely-pathogenic" cx="21" cy="21" r="15.91549430918954" fill="none" stroke-width="3" stroke-dasharray="{{ $panel['classlength']['Likely Pathogenic'] }} {{ 100.00 - $panel['classlength']['Likely Pathogenic'] }}" stroke-dashoffset="{{ $panel['classoffsets']['Likely Pathogenic'] }}"  onmousemove="showSvgTooltip(evt, '{{ $panel['classtotals']['Likely Pathogenic'] }} Likely Pathogenic');" onmouseout="hideSvgTooltip();"/>

                      <circle class="donut-segment chart-stroke-uncertain-significance" cx="21" cy="21" r="15.91549430918954"  fill="none" stroke-width="3" stroke-dasharray="{{ $panel['classlength']['Uncertain Significance'] }} {{ 100.00 - $panel['classlength']['Uncertain Significance'] }}" stroke-dashoffset="{{ $panel['classoffsets']['Uncertain Significance'] }}"  onmousemove="showSvgTooltip(evt, '{{ $panel['classtotals']['Uncertain Significance'] }} Uncertain Significance');" onmouseout="hideSvgTooltip();"/>

                      <circle class="donut-segment chart-stroke-likely-benign " cx="21" cy="21" r="15.91549430918954"  fill="none"  stroke-width="3" stroke-dasharray="{{ $panel['classlength']['Likely Benign'] }} {{ 100.00 - $panel['classlength']['Likely Benign'] }}" stroke-dashoffset="{{ $panel['classoffsets']['Likely Benign'] }}"  onmousemove="showSvgTooltip(evt, '{{ $panel['classtotals']['Likely Benign'] }} Likely Benign');" onmouseout="hideSvgTooltip();"/>

                      <circle class="donut-segment chart-stroke-benign" cx="21" cy="21" r="15.91549430918954" fill="none" stroke-width="3" stroke-dasharray="{{ $panel['classlength']['Benign'] }} {{ 100.00 - $panel['classlength']['Benign'] }}" stroke-dashoffset="{{ $panel['classoffsets']['Benign'] }}"  onmousemove="showSvgTooltip(evt, '{{ $panel['classtotals']['Benign'] }} Benign');" onmouseout="hideSvgTooltip();"/>

                        <!-- unused 10% -->
                        <g class="chart-text">
                          <text x="50%" y="50%" class="chart-number">
                            {{ $panel['count'] }}
                          </text>
                          <text x="50%" y="50%" class="chart-label">
                            Curations
                          </text>
                        </g>
                      </svg>

                      <div class="mb-2 lineheight-tight">{{ $panel['label'] }}</div>

                    </a>
                  </div>
                </div>
             </div>

          {{-- @endif --}}
          @if ($i % 4 == 1)
            <br clear="all" />
          @endif
          @endforeach
          {{-- <div class="text-center mb-4">
            <a class="btn btn-default btn-lg btn-primary" href="#" role="button">Load more Variant Curation Expert Panels</a>
          </div> --}}


        </div>
      </div>
		</div>
	</div>
</div>
<div id="svgtooltip" display="none" style="position: absolute; display: none;"></div>

@endsection

@section('heading')
<div class="content ">
    <div class="section-heading-content">
    </div>
</div>
@endsection

@section('script_css')

@endsection

@section('script_js')

<script>
	/**
	**
	**		Globals
	**
	*/

	/**
	 *
	 * Listener for displaying only genes
	 *
	 * */
	/*$('.donut-segment').on('mouseover', function() {

    var title = $(this).attr("data-text");
    var value = $(this).attr("data-value");

    //alert(title);
    //$('[data-toggle="tooltip"]').tooltip();
	});*/

  $( "#collapseMoreGcepsButton" ).click(function() {
  $( "#collapseMoreGcepsButtonWrapper" ).remove();
});

function showSvgTooltip(evt, text) {
  let svgtooltip = document.getElementById("svgtooltip");
  svgtooltip.innerHTML = text;
  svgtooltip.style.display = "block";
  svgtooltip.style.left = evt.pageX + 10 + 'px';
  svgtooltip.style.top = evt.pageY + 10 + 'px';
}

function hideSvgTooltip() {
  var svgtooltip = document.getElementById("svgtooltip");
  svgtooltip.style.display = "none";
}

  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip({
        'placement': 'auto',
        'html' : true
      });
  });

</script>

@endsection
