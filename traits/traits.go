package traits

import (
	"github.com/kataras/iris"
	"github.com/kataras/iris/mvc"
)

type (
	Traits struct {
		M string
		curd
		GetCycle         getCycle
		ListsCycle       listsCycle
		OriginListsCycle originListsCycle
		AddCycle         addCycle
		EditCycle        editCycle
		DeleteCycle      deleteCycle
	}

	curd struct {
		get         bool
		originLists bool
		lists       bool
		add         bool
		edit        bool
		delete      bool
	}
)

var (
	err error
)

func (c *Traits) CURD(get bool, originLists bool, lists bool, add bool, edit bool, delete bool) {
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
		b.Router().Post("/"+c.M+"/get", c.getModel)
	}
	if c.originLists {
		b.Router().Post("/"+c.M+"/originLists", c.originListsModel)
	}
	if c.lists {
		b.Router().Post("/"+c.M+"/lists", c.listsModel)
	}
	if c.add {
		b.Router().Post("/"+c.M+"/add", c.addModel)
	}
	if c.edit {
		b.Router().Post("/"+c.M+"/edit", c.editModel)
	}
	if c.delete {
		b.Router().Post("/"+c.M+"/delete", c.deleteModel)
	}
}

func (c *Traits) Success(ctx iris.Context, msg string) {
	ctx.JSON(iris.Map{
		"error": false,
		"msg":   msg,
	})
}

func (c *Traits) Failed(ctx iris.Context, msg string) {
	ctx.JSON(iris.Map{
		"error": true,
		"msg":   msg,
	})
}
