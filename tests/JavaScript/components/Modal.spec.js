import {mount} from '@vue/test-utils'
import expect from 'expect'
import TestUtils from './../TestUtils'
import Modal from './../../../resources/assets/js/components/Modal.vue'

describe('Testing the modal pop up', () => {
  let wrapper, utils

  beforeEach(() => {
    utils = new TestUtils()

    var options = {open: true}

    wrapper = mount(Modal, {
      propsData: { options }
    })
  })

  it('is visible when open is true', () => {
    utils.see('Close', wrapper)
  })

  it('shows title and body when modal is open', () => {
    var options = {open: true}
    var slots = { title: 'Some random title', body: 'This is some body text' }

    wrapper = mount(Modal, {
      propsData: { options },
      slots: slots
    })

    utils.see(slots.title, wrapper)
    utils.see(slots.body, wrapper)
  })

  it('does not show the title and body when slot if not set', () => {
    utils.divNotPresent('.modal-body', wrapper)
    utils.divNotPresent('.modal-title', wrapper)
    utils.divNotPresent('.btn .btn-primary', wrapper)
  })

  it('raises an event when confirm button is clicked', () => {
    var options = {open: true}
    var slots = { title: 'Some random title', body: 'This is some body text', confirmbtn: 'Ok' }

    wrapper = mount(Modal, {
      propsData: { options },
      slots: slots
    })

    wrapper.find('.btn-primary').trigger('click')
    expect(wrapper.emitted().saved).toBeTruthy()
  })
})
