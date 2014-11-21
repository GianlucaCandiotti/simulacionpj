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
