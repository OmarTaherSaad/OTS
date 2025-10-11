<template>
  <div class="pricing-estimator">
    <div class="tiers">
      <div class="card tier" :class="{ active: form.tier==='starter' }" @click="selectTier('starter')">
        <h3>Starter</h3>
        <p class="muted">Entry package</p>
      </div>

      <div v-if="decoy.enabled" class="card tier decoy disabled">
        <h3>{{ decoy.label }}</h3>
        <div class="price">${{ decoy.price_usd }}</div>
        <p class="muted">{{ decoy.copy }}</p>
        <button class="btn" disabled>Not available</button>
      </div>

      <div class="card tier" :class="{ active: form.tier==='pro' }" @click="selectTier('pro')">
        <h3>Pro</h3>
        <p class="muted">Best value</p>
      </div>

      <div class="card tier enterprise">
        <h3>Enterprise</h3>
        <p class="muted">Contact me</p>
      </div>
    </div>

    <form @submit.prevent="submit">
      <div class="row">
        <label>
          <input type="checkbox" v-model="form.isEgyptBased" /> Egypt-based
        </label>
        <label>
          Currency
          <select v-model="form.currency">
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="EGP">EGP</option>
          </select>
        </label>
      </div>

      <div class="row">
        <label>Pages: {{ form.pages }}</label>
        <input type="range" min="1" max="50" v-model.number="form.pages" />
      </div>

      <fieldset>
        <legend>Features</legend>
        <label><input type="checkbox" v-model="form.themeLight" /> Theme light</label>
        <label><input type="checkbox" v-model="form.themeMedium" /> Theme medium</label>
        <label><input type="checkbox" v-model="form.themeHeavy" /> Theme heavy</label>
        <label><input type="checkbox" v-model="form.customSections" /> Custom sections</label>
        <label><input type="checkbox" v-model="form.animations" /> Animations</label>
        <label><input type="checkbox" v-model="form.multicurrency" /> Multicurrency</label>
        <label><input type="checkbox" v-model="form.translation" /> Translation</label>
        <label><input type="checkbox" v-model="form.subscriptions" /> Subscriptions</label>
        <label><input type="checkbox" v-model="form.paymobSetup" /> Paymob setup</label>
        <label><input type="checkbox" v-model="form.paytabsSetup" /> PayTabs setup</label>
        <label><input type="checkbox" v-model="form.shippingZones" /> Shipping zones</label>
        <label><input type="checkbox" v-model="form.seo" /> SEO</label>
        <label><input type="checkbox" v-model="form.pixelGa4" /> GA4/Pixel</label>
        <label><input type="checkbox" v-model="form.perfOpt" /> Performance</label>
        <label><input type="checkbox" v-model="form.accessibility" /> Accessibility</label>
        <label><input type="checkbox" v-model="form.qaAudit" /> QA audit</label>
        <label><input type="checkbox" v-model="form.blogSetup" /> Blog</label>
        <label><input type="checkbox" v-model="form.integrationKlaviyo" /> Klaviyo</label>
        <label><input type="checkbox" v-model="form.integrationMailchimp" /> Mailchimp</label>
        <label><input type="checkbox" v-model="form.whatsappChat" /> WhatsApp chat</label>
        <label><input type="checkbox" v-model="form.filterSearch" /> Filter/Search</label>
      </fieldset>

      <div class="row">
        <label><input type="checkbox" v-model="form.rushDelivery" /> Rush delivery</label>
        <label><input type="checkbox" v-model="form.maintenance" /> Monthly maintenance</label>
      </div>

      <button type="submit" class="btn primary">Give me Estimated Price</button>
    </form>

    <div v-if="result" class="result">
      <h2>Estimated total: {{ displayCurrency(result.total, form.currency) }}</h2>
      <p>{{ result.support_days }} days free support included.</p>
      <div>
        <h3>Estimated monthly costs you pay directly</h3>
        <ul>
          <li v-for="(val, key) in result.monthly" :key="key">{{ labelMonthly(key) }}: {{ currencySymbol('USD') }}{{ val }}</li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script setup>
import { reactive, ref, onMounted } from 'vue'
import axios from 'axios'

const decoy = reactive({ enabled: true, label: 'Starter+ (not recommended)', copy: 'Almost Pro price with fewer features. Choose Pro instead.', price_usd: 880 })

const form = reactive({
  tier: 'starter',
  isEgyptBased: true,
  pages: 10,
  themeLight: false,
  themeMedium: false,
  themeHeavy: false,
  customSections: false,
  animations: false,
  multicurrency: false,
  translation: false,
  subscriptions: false,
  paymobSetup: false,
  paytabsSetup: false,
  shippingZones: false,
  seo: false,
  pixelGa4: false,
  perfOpt: false,
  accessibility: false,
  qaAudit: false,
  blogSetup: false,
  integrationKlaviyo: false,
  integrationMailchimp: false,
  whatsappChat: false,
  filterSearch: false,
  rushDelivery: false,
  maintenance: false,
  currency: 'USD',
})

const result = ref(null)

function selectTier(t) {
  if (t === 'starter' || t === 'pro') form.tier = t
}

function currencySymbol(c) {
  return c === 'EUR' ? '€' : (c === 'EGP' ? 'E£' : '$')
}

function displayCurrency(map, currency) {
  const val = map[currency]
  return `${currencySymbol(currency)}${val}`
}

function labelMonthly(key) {
  const map = {
    shopify_basic: 'Shopify Basic',
    translation_app: 'Translation app',
    subscriptions_app: 'Subscriptions app',
    filter_search_app: 'Filter/Search app',
    shipping_app: 'Shipping app'
  }
  return map[key] || key
}

async function submit() {
  const { data } = await axios.post('/api/estimate', { ...form })
  result.value = data
}

onMounted(async () => {
  try {
    const { data } = await axios.get('/api/pricing-meta')
    if (data && data.decoy) {
      decoy.enabled = !!data.decoy.enabled
      decoy.label = data.decoy.label
      decoy.copy = data.decoy.copy
      decoy.price_usd = data.decoy.price_usd
    }
  } catch (e) {
    // ignore, fallback to defaults
  }
})
</script>

<style scoped>
.pricing-estimator { max-width: 900px; margin: 2rem auto; }
.tiers { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem; margin-bottom: 1rem; }
.card { border: 1px solid #e5e7eb; border-radius: 8px; padding: 1rem; text-align: center; }
.card.tier.active { border-color: #3b82f6; box-shadow: 0 0 0 2px rgba(59,130,246,0.2); }
.card.decoy { background: #fff7ed; border-color: #fdba74; }
.card.decoy .price { font-size: 1.4rem; font-weight: 700; margin: 0.25rem 0; }
.card.disabled { opacity: 0.6; }
.btn { padding: 0.5rem 0.75rem; border-radius: 6px; border: 1px solid #d1d5db; background: #f3f4f6; }
.btn.primary { background: #3b82f6; color: #fff; border-color: #2563eb; }
.row { display: flex; gap: 1rem; align-items: center; margin: 0.5rem 0; flex-wrap: wrap; }
fieldset { border: 1px dashed #e5e7eb; padding: 0.75rem; margin: 0.75rem 0; display: grid; grid-template-columns: repeat(2, minmax(200px, 1fr)); gap: 0.25rem 1rem; }
.muted { color: #6b7280; font-size: 0.9rem; }
.result { margin-top: 1.5rem; }
</style>
