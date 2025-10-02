document.addEventListener('DOMContentLoaded', () => { 
  // Mobile menu toggle
  const btn = document.getElementById('mobile-toggle');
  const menu = document.getElementById('mobile-menu');
  if (btn) {
    btn.addEventListener('click', () => {
      if (menu.style.display === 'block') menu.style.display = 'none';
      else menu.style.display = 'block';
    });
  }

  // Find Nearest Bin feature
  const findBinBtn = document.getElementById('find-bin');
  if (findBinBtn) {
    findBinBtn.addEventListener('click', (e) => {
      e.preventDefault();
      alert("Please enable location feature to find nearby bins.");

      // Show dummy location
      window.location.href = "dummy_location.html";
    });
  }
});
