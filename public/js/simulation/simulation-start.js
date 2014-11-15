function simulationType() {
    if (document.getElementById('quant-simulation').checked) {
      document.getElementById('quant-simulation-selected').style.display = 'block';
      document.getElementById('time-simulation-selected').style.display = 'none';
    }else if (document.getElementById('time-simulation').checked){
      document.getElementById('quant-simulation-selected').style.display = 'none';
      document.getElementById('time-simulation-selected').style.display = 'block';
    }
}
