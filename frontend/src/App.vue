<template>
  <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      app
      permanent
      width="300"
    >
      <v-sheet
        color="light-green darken-4"
        class="pa-4"
      >
        <img class="ml-4" src="images/logo.png"/>
      </v-sheet>

      <v-divider></v-divider>

      <v-card class="ma-2">
        <v-card-text>
          <img src="images/gis.jpeg"  width="100%" style="border-radius: 5px"/>
        </v-card-text>
      </v-card>

      <v-card class="ma-2">
        <v-card-text>
          <img src="images/station.jpeg"  width="100%" style="border-radius: 5px"/>
        </v-card-text>
      </v-card>
    </v-navigation-drawer>

    <v-main>
      <v-container
        class="py-8 px-6"
        fluid
      >
        <v-row>
          <v-col>
            <v-card>
              <v-subheader>{{ meteoData.dt }}</v-subheader>
              <v-list two-line dense>
                <v-list-item>
                  <v-list-item-avatar color="grey lighten-3">
                    <v-icon>mdi-thermometer</v-icon>
                  </v-list-item-avatar>

                  <v-list-item-content>
                    <v-list-item-title class="text-h6 animate-val-update" :key="meteoData.tAir">{{ meteoData.tAir }} &deg;C</v-list-item-title>

                    <v-list-item-subtitle>
                      Температура возуха
                    </v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
                <v-divider />

                <v-list-item>
                  <v-list-item-avatar color="grey lighten-3">
                    <v-icon>mdi-water-percent</v-icon>
                  </v-list-item-avatar>

                  <v-list-item-content>
                    <v-list-item-title class="text-h6 animate-val-update" :key="meteoData.hum">{{ meteoData.hum }} %</v-list-item-title>

                    <v-list-item-subtitle>
                      Влажность возуха
                    </v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
                <v-divider />

                <v-list-item>
                  <v-list-item-avatar color="grey lighten-3">
                    <v-icon>mdi-weather-windy</v-icon>
                  </v-list-item-avatar>

                  <v-list-item-content>
                    <v-list-item-title class="text-h6 animate-val-update" :key="meteoData.wind">{{ meteoData.wind }} м/с </v-list-item-title>

                    <v-list-item-subtitle>
                      Ветер юго-восточный
                    </v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
                <v-divider />

                <v-list-item>
                  <v-list-item-avatar color="grey lighten-3">
                    <v-icon v-if="meteoData.precipType === 'Дождь'">mdi-weather-pouring</v-icon>
                    <v-icon v-else>mdi-weather-partly-cloudy</v-icon>
                  </v-list-item-avatar>

                  <v-list-item-content>
                    <v-list-item-title class="text-h6 animate-val-update" :key="meteoData.precip">{{ meteoData.precip }} мм/ч</v-list-item-title>
                    <v-list-item-subtitle>
                      {{ meteoData.precipType }}
                    </v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
                <v-divider />
                <v-list-item>
                  <v-list-item-avatar color="grey lighten-3">
                    <v-icon>mdi-speedometer</v-icon>
                  </v-list-item-avatar>

                  <v-list-item-content>
                    <v-list-item-title class="text-h6 animate-val-update" :key="meteoData.press">{{ meteoData.press }} мм рт.ст.</v-list-item-title>

                    <v-list-item-subtitle>
                      Атмосферное давление
                    </v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
                <v-divider />

                <v-list-item>
                  <v-list-item-avatar color="grey lighten-3">
                    <v-icon>mdi-thermometer-lines</v-icon>
                  </v-list-item-avatar>

                  <v-list-item-content>
                    <v-list-item-title class="text-h6">
                      <span class="animate-val-update" :key="meteoData.t1">
                        {{ meteoData.t1 }} &deg;C
                      </span>
                      /
                      <span class="animate-val-update" :key="meteoData.m1">
                        {{ meteoData.m1 }} %
                      </span>
                    </v-list-item-title>

                    <v-list-item-subtitle>
                      Температура / влажность почвы 5 см
                    </v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
                <v-list-item>
                  <v-list-item-avatar color="white">
                  </v-list-item-avatar>
                  <v-list-item-content>
                    <v-list-item-title class="text-h6">
                      <span class="animate-val-update" :key="meteoData.t2">
                        {{ meteoData.t2 }} &deg;C
                      </span>
                      /
                      <span class="animate-val-update" :key="meteoData.m2">
                        {{ meteoData.m2 }} %
                      </span>
                    </v-list-item-title>

                    <v-list-item-subtitle>
                      Температура / влажность почвы 15 см
                    </v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
                <v-list-item>
                  <v-list-item-avatar color="white">
                  </v-list-item-avatar>
                  <v-list-item-content>
                    <v-list-item-title class="text-h6">
                      <span class="animate-val-update" :key="meteoData.t3">
                        {{ meteoData.t3 }} &deg;C
                      </span>
                      /
                      <span class="animate-val-update" :key="meteoData.m3">
                        {{ meteoData.m3 }} %
                      </span>
                    </v-list-item-title>

                    <v-list-item-subtitle>
                      Температура / влажность почвы 25 см
                    </v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
                <v-list-item>
                  <v-list-item-avatar color="white">
                  </v-list-item-avatar>
                  <v-list-item-content>
                    <v-list-item-title class="text-h6">
                      <span class="animate-val-update" :key="meteoData.t4">
                        {{ meteoData.t4 }} &deg;C
                      </span>
                      /
                      <span class="animate-val-update" :key="meteoData.m4">
                        {{ meteoData.m4 }} %
                      </span>
                    </v-list-item-title>

                    <v-list-item-subtitle>
                      Температура / влажность почвы 35 см
                    </v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
                <v-list-item>
                  <v-list-item-avatar color="white">
                  </v-list-item-avatar>
                  <v-list-item-content>
                    <v-list-item-title class="text-h6">
                      <span class="animate-val-update" :key="meteoData.t5">
                        {{ meteoData.t5 }} &deg;C
                      </span>
                      /
                      <span class="animate-val-update" :key="meteoData.m5">
                        {{ meteoData.m5 }} %
                      </span>
                    </v-list-item-title>

                    <v-list-item-subtitle>
                      Температура / влажность почвы 45 см
                    </v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
                <v-list-item>
                  <v-list-item-avatar color="white">
                  </v-list-item-avatar>
                  <v-list-item-content>
                    <v-list-item-title class="text-h6">
                      <span class="animate-val-update" :key="meteoData.t6">
                        {{ meteoData.t6 }} &deg;C
                      </span>
                      /
                      <span class="animate-val-update" :key="meteoData.m6">
                        {{ meteoData.m6 }} %
                      </span>
                    </v-list-item-title>

                    <v-list-item-subtitle>
                      Температура / влажность почвы 55 см
                    </v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
              </v-list>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import axios from 'axios'
import moment from 'moment'
moment.locale('ru')

export default {
  data: () => ({
    drawer: null,
    meteoData: {
      dt: null,
      tAir: null,
      hum: null,
      wind: null,
      precip: 0,
      press: null,
      t1: null,
      t2: null,
      t3: null,
      t4: null,
      t5: null,
      t6: null,
      m1: null,
      m2: null,
      m3: null,
      m4: null,
      m5: null,
      m6: null
    }
  }),

  mounted () {
    this.getData()
    setInterval(() => { this.getData() }, 10000)
  },

  methods: {
    random (val, delta, n) {
      // случайное число от min до (max+1)
      const rand = -delta + Math.random() * (2 * delta + 1)
      const res = parseFloat(val) + (Math.floor(rand) / n)

      return Math.round(res * n) / n
    },

    getData () {
      axios.get('/api/data/').then(response => {
        const data = response.data
        const hum = this.random(data.air_data.data.humidity, 1, 10)
        this.meteoData.dt = moment().format('DD MMMM hh:mm:ss')
        this.meteoData.tAir = this.random(data.air_data.data.t_air, 1, 10)
        this.meteoData.hum = hum < 100 ? hum : 100
        this.meteoData.wind = Math.abs(this.random(data.air_data.data.wind_speed, 5, 10))
        this.meteoData.precip = data.air_data.data.precipitation_intensity > 0
          ? Math.abs(this.random(data.air_data.data.precipitation_intensity, 3, 10))
          : 0
        this.meteoData.precipType = this.meteoData.precip > 0 ? 'Дождь' : 'Без осадков'
        this.meteoData.press = data.air_data.data.pressure
        this.meteoData.t1 = this.random(data.soil_data.data.soil_temperature_1, 1, 10)
        this.meteoData.t2 = this.random(data.soil_data.data.soil_temperature_2, 1, 10)
        this.meteoData.t3 = this.random(data.soil_data.data.soil_temperature_3, 1, 10)
        this.meteoData.t4 = this.random(data.soil_data.data.soil_temperature_4, 1, 10)
        this.meteoData.t5 = this.random(data.soil_data.data.soil_temperature_5, 1, 10)
        this.meteoData.t6 = this.random(data.soil_data.data.soil_temperature_6, 1, 10)
        this.meteoData.m1 = this.random(data.soil_data.data.soil_moisture_1, 1, 10)
        this.meteoData.m2 = this.random(data.soil_data.data.soil_moisture_2, 1, 10)
        this.meteoData.m3 = this.random(data.soil_data.data.soil_moisture_3, 1, 10)
        this.meteoData.m4 = this.random(data.soil_data.data.soil_moisture_4, 1, 10)
        this.meteoData.m5 = this.random(data.soil_data.data.soil_moisture_5, 1, 10)
        this.meteoData.m6 = this.random(data.soil_data.data.soil_moisture_6, 1, 10)
      }).catch(e => { console.log(e) })
    }
  }
}
</script>

<style>
.animate-val-update {
  color: '#ECEFF1';
  animation: animate-upd .3s;
}
@keyframes animate-upd {
  1% { color: #000; zoom: 100%; }
  20% { color: #FFE0B2; zoom: 120%; }
  30% { zoom: 115%; }
  40% { zoom: 110%; }
  50% { zoom: 105%; }
  60% { zoom: 100%; }
  99% { color: #000}
}
</style>
