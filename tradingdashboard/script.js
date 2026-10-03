$(document).ready(function () {
  var chartObj = null;
  var pieObj = null;
  var timeframe = "1D";

  // Raw market feed dataset
  var marketData = {
    "1D": {
      times: [
        "09:30",
        "10:30",
        "11:30",
        "12:30",
        "13:30",
        "14:30",
        "15:30",
        "16:00",
      ],
      rates: [181.2, 182.45, 181.9, 183.1, 184.05, 183.8, 185.3, 186.15],
    },
    "5D": {
      times: ["Mon", "Tue", "Wed", "Thu", "Fri"],
      rates: [176.5, 178.2, 177.9, 182.1, 186.15],
    },
    "1M": {
      times: ["W1", "W2", "W3", "W4"],
      rates: [168.0, 172.4, 179.1, 186.15],
    },
    "1Y": {
      times: ["Q1", "Q2", "Q3", "Q4"],
      rates: [142.0, 155.8, 169.3, 186.15],
    },
  };

  // Render header stats and stock ticker tape
  function setupDashboard() {
    var d = new Date();
    $("#reportDate").text(d.toLocaleDateString());

    var tape = [
      '<span class="ticker-chip"><b>NXC</b> $186.15 <span class="up">+2.73%</span></span>',
      '<span class="ticker-chip"><b>AAPL</b> $228.10 <span class="up">+1.60%</span></span>',
      '<span class="ticker-chip"><b>MSFT</b> $448.90 <span class="down">-0.42%</span></span>',
      '<span class="ticker-chip"><b>NVDA</b> $119.40 <span class="down">-1.18%</span></span>',
      '<span class="ticker-chip"><b>AMZN</b> $186.50 <span class="up">+0.85%</span></span>',
      '<span class="ticker-chip"><b>BTC/USD</b> $61,450 <span class="up">+5.58%</span></span>',
    ].join("");

    $("#tickerTrack").html(tape + tape);

    $("#statsGrid").html(
      '<div class="stat-row"><dt>Market Cap</dt><dd>$4.28B</dd></div>' +
        '<div class="stat-row"><dt>PE Ratio</dt><dd>24.6</dd></div>' +
        '<div class="stat-row"><dt>52W High</dt><dd>$192.40</dd></div>' +
        '<div class="stat-row"><dt>52W Low</dt><dd>$134.10</dd></div>' +
        '<div class="stat-row"><dt>Volume</dt><dd>2.84M</dd></div>' +
        '<div class="stat-row"><dt>Yield</dt><dd>1.42%</dd></div>',
    );

    $("#newsList").html(
      '<li class="news-row"><span class="news-tag bg-line text-amber">EARNINGS</span><span class="news-copy">Q3 revenue surpasses estimates by 12% driven by enterprise expansion.<small>Today, 09:42 &middot; Nexcore Investor Relations</small></span></li>' +
        '<li class="news-row"><span class="news-tag bg-line text-amber">PRODUCT</span><span class="news-copy">Nexcore announces NextGen infrastructure protocol rollout.<small>Today, 08:15 &middot; Market Desk</small></span></li>' +
        '<li class="news-row"><span class="news-tag bg-line text-amber">MARKET</span><span class="news-copy">Analyst firm upgrades rating to Outperform with $210 target.<small>Yesterday, 16:28 &middot; Northstar Research</small></span></li>',
    );

    $("#sectorSummary").html(
      '<div><span><i class="sector-dot cloud"></i>Cloud</span><strong>45%</strong></div>' +
        '<div><span><i class="sector-dot hardware"></i>Hardware</span><strong>25%</strong></div>' +
        '<div><span><i class="sector-dot services"></i>Services</span><strong>20%</strong></div>' +
        '<div><span><i class="sector-dot cash"></i>Cash</span><strong>10%</strong></div>',
    );

    refreshDisplay(186.15, 4.95, 2.73);

    // Position range dot
    var min = 134.1,
      max = 192.4,
      cur = 186.15;
    $("#rangeLowLabel").text("$" + min.toFixed(2));
    $("#rangeHighLabel").text("$" + max.toFixed(2));
    var pct = ((cur - min) / (max - min)) * 100;
    $("#rangeDot").css("left", pct + "%");
  }

  function refreshDisplay(price, diff, pct) {
    $("#livePrice").text("$" + price.toFixed(2));
    $("#liveChange")
      .text("+" + diff.toFixed(2) + " (+" + pct.toFixed(2) + "%)")
      .attr("class", "font-mono text-sm text-gain");

    var el = $("#livePrice");
    el.removeClass("flash-up flash-down");
    setTimeout(function () {
      el.addClass("flash-up");
    }, 10);
  }

  function renderCharts() {
    var c1 = document.getElementById("priceChart");
    if (c1) {
      chartObj = new Chart(c1.getContext("2d"), {
        type: "line",
        data: {
          labels: marketData["1D"].times,
          datasets: [
            {
              data: marketData["1D"].rates,
              borderColor: "#e3b341",
              borderWidth: 2,
              pointRadius: 0,
              tension: 0.2,
              fill: false,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: { legend: { display: false } },
          scales: {
            x: {
              grid: { color: "#232b3a" },
              ticks: { color: "#7d8a9e", font: { family: "IBM Plex Mono" } },
            },
            y: {
              grid: { color: "#232b3a" },
              ticks: { color: "#7d8a9e", font: { family: "IBM Plex Mono" } },
            },
          },
        },
      });
    }

    var c2 = document.getElementById("sectorChart");
    if (c2) {
      pieObj = new Chart(c2.getContext("2d"), {
        type: "doughnut",
        data: {
          labels: ["Cloud", "Hardware", "Services", "Cash"],
          datasets: [
            {
              data: [45, 25, 20, 10],
              backgroundColor: ["#e3b341", "#3fb950", "#1b2230", "#f85149"],
              borderWidth: 0,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: { legend: { display: false } },
          cutout: "70%",
        },
      });
    }
  }

  // Timeframe selector clicks
  $("#rangeButtons").on("click", ".range-btn", function () {
    $(".range-btn").removeClass("active");
    $(this).addClass("active");

    timeframe = $(this).data("range");
    var activeSet = marketData[timeframe];

    if (chartObj && activeSet) {
      chartObj.data.labels = activeSet.times;
      chartObj.data.datasets[0].data = activeSet.rates;
      chartObj.update();
    }
  });

  // Manual tick update button
  $("#refreshBtn").on("click", function () {
    var shift = (Math.random() - 0.48) * 0.8;
    var list = marketData["1D"].rates;
    var newRate = +(list[list.length - 1] + shift).toFixed(2);
    list[list.length - 1] = newRate;

    var diff = newRate - 181.2;
    refreshDisplay(newRate, diff, (diff / 181.2) * 100);

    if (timeframe === "1D" && chartObj) {
      chartObj.data.datasets[0].data = list;
      chartObj.update("none");
    }
  });

  setupDashboard();
  renderCharts();
});
