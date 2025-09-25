(function () {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    if (all) {
      select(el, all).forEach(e => e.addEventListener(type, listener))
    } else {
      select(el, all).addEventListener(type, listener)
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Sidebar toggle
   */
  if (select('.toggle-sidebar-btn')) {
    on('click', '.toggle-sidebar-btn', function (e) {
      select('body').classList.toggle('toggle-sidebar')
    })
  }

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
      } else {
        selectHeader.classList.remove('header-scrolled')
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Initiate tooltips
   */
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })

  /**
   * Inpute type number hide up-down arrow
   */
  const $inputElement = $('.arrow-none');
  $inputElement.on('keydown', function (e) {
    if ([37, 38, 39, 40].includes(e.which)) {
      e.preventDefault();
    }
  });

  /**
   * Block copy and pest in input
   */
  const $copyPestNone = $('.cp-e-none');
  $copyPestNone.on('copy paste', function (e) {
    e.preventDefault();
  });

})();

/**
 * Convert amount to words
 */
function amountToWordsIndianCurrency(num) {
  const oneToNineteen = [
    '', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten',
    'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen',
    'seventeen', 'eighteen', 'nineteen'
  ];
  const tens = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

  function twoDigits(n) {
    if (n < 20) return oneToNineteen[n];
    return tens[Math.floor(n / 10)] + (n % 10 ? '-' + oneToNineteen[n % 10] : '');
  }

  function convertToIndianWords(n) {
    if (n === 0) return 'zero';

    const crore = Math.floor(n / 10000000);
    const lakh = Math.floor((n % 10000000) / 100000);
    const thousand = Math.floor((n % 100000) / 1000);
    const hundred = Math.floor((n % 1000) / 100);
    const rest = n % 100;

    let words = [];

    if (crore) words.push(twoDigits(crore) + ' crore');
    if (lakh) words.push(twoDigits(lakh) + ' lakh');
    if (thousand) words.push(twoDigits(thousand) + ' thousand');
    if (hundred) words.push(oneToNineteen[hundred] + ' hundred');
    if (rest) {
      if (hundred) words.push('and');
      words.push(twoDigits(rest));
    }

    return words.join(' ');
  }

  if (typeof num !== 'number') num = parseFloat(num);
  if (isNaN(num)) return 'Invalid input';

  const parts = num.toFixed(2).split('.');
  const rupees = parseInt(parts[0]);
  const paise = parseInt(parts[1]);

  let result = '';

  if (rupees > 0) {
    result += convertToIndianWords(rupees);
  } else {
    result += 'zero';
  }

  if (paise > 0) {
    result += ' and ' + convertToIndianWords(paise) + ' paise';
  }

  result += ' only';

  // Capitalize only the first character
  return result.charAt(0).toUpperCase() + result.slice(1);
}
