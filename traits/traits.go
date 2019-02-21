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
	method := "POST"
	if c.get {
		b.Handle(method, "/"+c.Model+"/get", "GetModel")
	}
	if c.originLists {
		b.Handle(method, "/"+c.Model+"/originLists", "OriginListsModel")
	}
	if c.lists {
		b.Handle(method, "/"+c.Model+"/lists", "ListsModel")
	}
	if c.add {
		b.Handle(method, "/"+c.Model+"/add", "AddModel")
	}
	if c.edit {
		b.Handle(method, "/"+c.Model+"/edit", "EditModel")
	}
	if c.delete {
		b.Handle(method, "/"+c.Model+"/delete", "DeleteModel")
	}
}
