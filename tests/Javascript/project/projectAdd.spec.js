import {mount} from '@vue/test-utils'
import expect from 'expect'
import ProjectAdd from './../../../resources/assets/js/project/ProjectAdd.vue'

describe('Testing Project add component', () =>  {
  let wrapper

  beforeEach(() => {
    wrapper = mount(ProjectAdd)
  })

  it('shows the two fields name and git url', () => {
    expect(wrapper.html()).toContain('Project name')
    expect(wrapper.html()).toContain('Git url')
    expect(wrapper.html()).toContain('Save')
  })
})
