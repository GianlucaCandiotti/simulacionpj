function simulationType() {
  if (document.getElementById('quant-simulation').checked) {
    document.getElementById('quant-simulation-selected').style.display = 'block';
    document.getElementById('time-simulation-selected').style.display = 'none';
  }else if (document.getElementById('time-simulation').checked){
    document.getElementById('quant-simulation-selected').style.display = 'none';
    document.getElementById('time-simulation-selected').style.display = 'block';
  }
}

function distributionTypeA(){
  if (document.getElementById('uniform-simulation-A').checked) {
    document.getElementById('uniform-distribution-A-selected').style.display = 'block';
    document.getElementById('exponential-distribution-A-selected').style.display = 'none';
    document.getElementById('normal-distribution-A-selected').style.display = 'none';
    document.getElementById('discrete-distribution-A-selected').style.display = 'none';
  }else if (document.getElementById('exponential-simulation-A').checked) {
    document.getElementById('uniform-distribution-A-selected').style.display = 'none';
    document.getElementById('exponential-distribution-A-selected').style.display = 'block';
    document.getElementById('normal-distribution-A-selected').style.display = 'none';
    document.getElementById('discrete-distribution-A-selected').style.display = 'none';
  }else if (document.getElementById('normal-simulation-A').checked) {
    document.getElementById('uniform-distribution-A-selected').style.display = 'none';
    document.getElementById('exponential-distribution-A-selected').style.display = 'none';
    document.getElementById('normal-distribution-A-selected').style.display = 'block';
    document.getElementById('discrete-distribution-A-selected').style.display = 'none';
  }else if (document.getElementById('discrete-simulation-A').checked) {
    document.getElementById('uniform-distribution-A-selected').style.display = 'none';
    document.getElementById('exponential-distribution-A-selected').style.display = 'none';
    document.getElementById('normal-distribution-A-selected').style.display = 'none';
    document.getElementById('discrete-distribution-A-selected').style.display = 'block';
  }
}

function distributionTypeB(){
  if (document.getElementById('uniform-simulation-B').checked) {
    document.getElementById('uniform-distribution-B-selected').style.display = 'block';
    document.getElementById('exponential-distribution-B-selected').style.display = 'none';
    document.getElementById('normal-distribution-B-selected').style.display = 'none';
    document.getElementById('discrete-distribution-B-selected').style.display = 'none';
  }else if (document.getElementById('exponential-simulation-B').checked) {
    document.getElementById('uniform-distribution-B-selected').style.display = 'none';
    document.getElementById('exponential-distribution-B-selected').style.display = 'block';
    document.getElementById('normal-distribution-B-selected').style.display = 'none';
    document.getElementById('discrete-distribution-B-selected').style.display = 'none';
  }else if (document.getElementById('normal-simulation-B').checked) {
    document.getElementById('uniform-distribution-B-selected').style.display = 'none';
    document.getElementById('exponential-distribution-B-selected').style.display = 'none';
    document.getElementById('normal-distribution-B-selected').style.display = 'block';
    document.getElementById('discrete-distribution-B-selected').style.display = 'none';
  }else if (document.getElementById('discrete-simulation-B').checked) {
    document.getElementById('uniform-distribution-B-selected').style.display = 'none';
    document.getElementById('exponential-distribution-B-selected').style.display = 'none';
    document.getElementById('normal-distribution-B-selected').style.display = 'none';
    document.getElementById('discrete-distribution-B-selected').style.display = 'block';
  }
}

function distributionTypeC(){
  if (document.getElementById('uniform-simulation-C').checked) {
    document.getElementById('uniform-distribution-C-selected').style.display = 'block';
    document.getElementById('exponential-distribution-C-selected').style.display = 'none';
    document.getElementById('normal-distribution-C-selected').style.display = 'none';
    document.getElementById('discrete-distribution-C-selected').style.display = 'none';
  }else if (document.getElementById('exponential-simulation-C').checked) {
    document.getElementById('uniform-distribution-C-selected').style.display = 'none';
    document.getElementById('exponential-distribution-C-selected').style.display = 'block';
    document.getElementById('normal-distribution-C-selected').style.display = 'none';
    document.getElementById('discrete-distribution-C-selected').style.display = 'none';
  }else if (document.getElementById('normal-simulation-C').checked) {
    document.getElementById('uniform-distribution-C-selected').style.display = 'none';
    document.getElementById('exponential-distribution-C-selected').style.display = 'none';
    document.getElementById('normal-distribution-C-selected').style.display = 'block';
    document.getElementById('discrete-distribution-C-selected').style.display = 'none';
  }else if (document.getElementById('discrete-simulation-C').checked) {
    document.getElementById('uniform-distribution-C-selected').style.display = 'none';
    document.getElementById('exponential-distribution-C-selected').style.display = 'none';
    document.getElementById('normal-distribution-C-selected').style.display = 'none';
    document.getElementById('discrete-distribution-C-selected').style.display = 'block';
  }
}
