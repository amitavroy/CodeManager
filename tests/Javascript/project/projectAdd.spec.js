import {mount} from '@vue/test-utils'
import expect from 'expect'
import moxios from 'moxios'
import TestUtils from './../TestUtils'
import ProjectAdd from './../../../resources/assets/js/project/ProjectAdd.vue'

describe('Testing Project add component', () =>  {
  let wrapper, utils

  beforeEach(() => {
    utils = new TestUtils()
    wrapper = mount(ProjectAdd)
    moxios.install()
  })

  afterEach(() => {
    moxios.uninstall()
  })

  it('shows the two fields name and git url', () => {
    expect(wrapper.html()).toContain('Project name')
    expect(wrapper.html()).toContain('Git url')
    expect(wrapper.html()).toContain('Save')
  })

  it('shows validation error when fields are empty', (done) => {
    let gitUrlError = 'The git url field is required.'
    let nameError = 'The name field is required.'

    wrapper.find('.btn-primary').trigger('click')

    moxios.stubRequest('/project/add', {
      status: 422,
      response: {
        errors: {
          git_url: [gitUrlError],
          name: [nameError] 
        }
      }
    })

    moxios.wait(() => {
      utils.see(gitUrlError, wrapper)
      utils.see(nameError, wrapper)
      done()
    })
  })

  let see = (text, selector) => {
    let wrap = selector ? wrapper.find(selector) : wrapper;
    expect(wrap.html()).toContain(text);
  };
})
