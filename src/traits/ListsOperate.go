package traits

import (
	"github.com/kataras/iris"
	"github.com/kataras/iris/mvc"
)

type ListsOperate struct{}

func (r *ListsOperate) PostLists() mvc.Result {
	return mvc.Response{
		Object: iris.Map{"error": 0},
	}
}
