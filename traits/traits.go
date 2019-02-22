package traits

import (
	"github.com/kataras/iris/mvc"
)

type (
	Traits struct {
		Model string
		Lifecycle
		curd
	}

	curd struct {
		get         bool
		originLists bool
		lists       bool
		add         bool
		edit        bool
		delete      bool
	}

	Lifecycle struct {
		GetBeforeHooks          func()
		GetCustomReturn         func(interface{})
		ListsBeforeHooks        func()
		ListsCustomReturn       func(interface{}, int)
		OriginListsBeforeHooks  func()
		OriginListsCustomReturn func(interface{})
		AddBeforeHooks          func()
		AddAfterHooks           func(interface{})
		EditBeforeHooks         func()
		EditAfterHooks          func()
		DeleteBeforeHooks       func()
		DeletePrepHooks         func()
		DeleteAfterHooks        func()
	}
)

func (c *Traits) Curd(get bool, originLists bool, lists bool, add bool, edit bool, delete bool) {
	c.curd = curd{
		get:         get,
		originLists: originLists,
		lists:       lists,
		add:         add,
		edit:        edit,
		delete:      delete,
	}
}

func (c *Traits) BeforeActivation(b mvc.BeforeActivation) {
	if c.get {
		b.Router().Post("/"+c.Model+"/get", c.getModel)
	}
	if c.originLists {
		b.Router().Post("/"+c.Model+"/originLists", c.originListsModel)
	}
	if c.lists {
		b.Router().Post("/"+c.Model+"/lists", c.listsModel)
	}
	if c.add {
		b.Router().Post("/"+c.Model+"/add", c.addModel)
	}
	if c.edit {
		b.Router().Post("/"+c.Model+"/edit", c.editModel)
	}
	if c.delete {
		b.Router().Post("/"+c.Model+"/delete", c.deleteModel)
	}
}
