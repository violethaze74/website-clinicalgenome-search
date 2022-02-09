@extends('mail.layout.default')

@section('heading')
GC Express Report
@endsection

@section('content')
Hello,<br/><br/>
Attached is the new report of active GC Express curations on the ClinGen Website.
<br />
<br />
@endsection

@section('boilerplate')
	<strong>About ClinGen - Clinical Genome Resource</strong><br/>
ClinGen is a National Institutes of Health (NIH)-funded resource dedicated to building an authoritative central
resource that defines the clinical relevance of genes and variants for use in precision medicine and research.
</br></br>
To learn more about ClinGen, visit <a href="https://clinicalgenome.org">www.clinicalgenome.org</a>
@endsection
