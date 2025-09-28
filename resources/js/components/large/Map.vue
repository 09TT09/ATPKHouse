<script setup>
  (g => {
    let h;
    const p = "The Google Maps JavaScript API";
    const c = "google";
    const l = "importLibrary";
    const q = "__ib__";
    const m = document;
    const b = window;

    b[c] = b[c] || {};
    const d = b[c].maps || (b[c].maps = {});
    const r = new Set();
    const e = new URLSearchParams();

    const u = () =>
      h ||
      (h = new Promise(async (resolve, reject) => {
        const a = m.createElement("script");
        e.set("libraries", [...r].join(","));
        for (const k in g) {
          e.set(k.replace(/[A-Z]/g, t => "_" + t.toLowerCase()), g[k]);
        }
        e.set("callback", `${c}.maps.${q}`);
        a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
        d[q] = resolve;
        a.onerror = () => (h = reject(new Error(p + " could not load.")));
        a.nonce = m.querySelector("script[nonce]")?.nonce || "";
        m.head.append(a);
      }));

    if (d[l]) {
      console.warn(`${p} only loads once. Ignoring:`, g);
    } else {
      d[l] = (f, ...n) => {
        r.add(f);
        return u().then(() => d[l](f, ...n));
      };
    }
  })({
    v: "weekly",
  });

  let map;

  async function initMap() {
    const position = { lat: 48.85341, lng: 2.3488 };
    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

    map = new Map(document.getElementById("map"), {
      zoom: 14,
      center: position,
      mapId: "DEMO_MAP_ID",
    });

    new AdvancedMarkerElement({
      map: map,
      position: position,
      title: "Marker",
    });
  }

  initMap();
</script>

<template>
  <div class="map layout-container">
    <div id="map" class="map-google"></div>
  </div>
</template>

<style scoped>
  .map-google {
    width: 100%;
    aspect-ratio: 1350 / 700;
    border-radius: 60px;
  }

  @media screen and (max-width: 1020px) {
    .map-google {
      width: 100%;
      aspect-ratio: 1350 / 700;
      border-radius: 30px;
    }
  }

  @media screen and (max-width: 1000px) {
    .map-google {
      aspect-ratio: 5 / 3;
    }
  }

  @media screen and (max-width: 600px) {
    .map-google {
      aspect-ratio: 5 / 4;
      border-radius: 12px;
    }
  }

  @media screen and (max-width: 500px) {
    .map-google {
      aspect-ratio: 7 / 6;
    }
  }
</style>
