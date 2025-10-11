import { mount } from '@vue/test-utils'
import { describe, it, expect } from 'vitest'
import EstimateForm from '../../resources/js/components/EstimateForm.vue'

describe('EstimateForm', () => {
  it('renders decoy card disabled and not selectable', async () => {
    const wrapper = mount(EstimateForm)
    const decoyBtn = wrapper.find('.decoy button')
    expect(decoyBtn.attributes('disabled')).toBeDefined()

    await wrapper.find('.decoy').trigger('click')
    // clicking decoy must not change tier to any decoy value; only starter/pro allowed
    // ensure form.tier still default 'starter'
    expect((wrapper.vm as any).form.tier).toBe('starter')
  })
})
