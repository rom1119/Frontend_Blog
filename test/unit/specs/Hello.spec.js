import Vue from 'vue'
import Hello from '../../../src/components/elements/logo'

describe('Hello.vue', () => {
  it('should render correct contents', () => {
    const Constructor = Vue.extend(Hello)
    const vm = new Constructor().$mount()
    expect(vm.$el.querySelector('.logo-desc').textContent)
      .to.equal('Polskie blogowisko programistyczne')
  })
})
